<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilAngket;
use App\Models\AngketMetakognisi;
use App\Models\Saran;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    public function store(Request $request)
    {
        $jawaban = json_decode($request->input('all_jawaban'), true);
        
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $nim = $mahasiswa->nim;
        
        if (!$jawaban || !is_array($jawaban)) {
            return redirect()->back()->with('error', 'Data jawaban tidak valid.');
        }
    
        $encodedJawaban = implode(",", $jawaban); // Ubah ke format string untuk penyimpanan
        
        // Ambil seluruh data angket dari database
        $angket = AngketMetakognisi::all();
        
        // Hitung nilai KM dan RM berdasarkan kode_angket
        $nilai_km = 0;
        $nilai_rm = 0;
        
        foreach ($angket as $index => $item) {
            if (isset($jawaban[$index])) { // Gunakan index array
                if ($item->kode_angket === 'KM') {
                    $nilai_km += $jawaban[$index];
                } elseif ($item->kode_angket === 'RM') {
                    $nilai_rm += $jawaban[$index];
                }
            }
        }

        // Fuzzifikasi KM
        $km_rendah = $nilai_km <= 34 ? 1 : ($nilai_km <= 51 ? (51 - $nilai_km) / (51 - 34) : 0);
        $km_sedang = ($nilai_km <= 34 || $nilai_km >= 68) ? 0 : ($nilai_km <= 51 ? ($nilai_km - 34) / (51 - 34) : (68 - $nilai_km) / (68 - 51));
        $km_tinggi = $nilai_km <= 51 ? 0 : ($nilai_km <= 68 ? ($nilai_km - 51) / (68 - 51) : 1);

        // Fuzzifikasi RM
        $rm_rendah = $nilai_rm <= 70 ? 1 : ($nilai_rm <= 105 ? (105 - $nilai_rm) / (105 - 70)  : 0);
        $rm_sedang = ($nilai_rm <= 70 || $nilai_rm >= 140) ? 0 : ($nilai_rm <= 105 ? ($nilai_rm - 70) / (105 - 70) : (140 - $nilai_rm) / (140-105));
        $rm_tinggi = $nilai_rm <= 105 ? 0 : ($nilai_rm <= 140 ? ($nilai_rm - 105) / (140-105) : 1);

        // Simpan ke database
        HasilAngket::updateOrCreate(
            ['nim' => $nim], // Cek berdasarkan NIM mahasiswa
            [
                'jawaban' => $encodedJawaban,
                'nilai_km' => $nilai_km,
                'nilai_rm' => $nilai_rm,
                'km_rendah' => round($km_rendah, 3),
                'km_sedang' => round($km_sedang, 3),
                'km_tinggi' => round($km_tinggi, 3),
                'rm_rendah' => round($rm_rendah, 3),
                'rm_sedang' => round($rm_sedang, 3),
                'rm_tinggi' => round($rm_tinggi, 3),
            ]
        );

        return redirect()->route('angket.info')->with('success', 'Data angket berhasil disimpan!');
    }
    public function info()
    {
        

        return view('mahasiswa.hasil.info');
    }
    public function show()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
    
    // Pastikan mahasiswa sudah login
    if (!$mahasiswa) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    // Ambil hasil angket berdasarkan NIM mahasiswa yang login
    $hasilAngket = HasilAngket::where('nim', $mahasiswa->nim)->first();

    // Jika hasil angket tidak ditemukan
    if (!$hasilAngket) {
        return redirect()->back()->with('error', 'Hasil angket tidak ditemukan.');
    }

    // Menentukan kategori KM
    $kategori_km = array_keys([
        'rendah' => $hasilAngket->km_rendah,
        'sedang' => $hasilAngket->km_sedang,
        'tinggi' => $hasilAngket->km_tinggi
    ], max($hasilAngket->km_rendah, $hasilAngket->km_sedang, $hasilAngket->km_tinggi))[0];

    // Menentukan kategori RM
    $kategori_rm = array_keys([
        'rendah' => $hasilAngket->rm_rendah,
        'sedang' => $hasilAngket->rm_sedang,
        'tinggi' => $hasilAngket->rm_tinggi
    ], max($hasilAngket->rm_rendah, $hasilAngket->rm_sedang, $hasilAngket->rm_tinggi))[0];

    // Mengambil saran dari database
    $saran_km = Saran::where('kategori', ucfirst($kategori_km))->where('kode_angket', 'KM')->value('saran');
    $saran_rm = Saran::where('kategori', ucfirst($kategori_rm))->where('kode_angket', 'RM')->value('saran');

    // Menentukan kategori akhir berdasarkan fire strength (logika "dan")
    $fire_strength = [
        'rendah' => min($hasilAngket->km_rendah, $hasilAngket->rm_rendah),
        'sedang' => min($hasilAngket->km_sedang, $hasilAngket->rm_sedang),
        'tinggi' => min($hasilAngket->km_tinggi, $hasilAngket->rm_tinggi)
    ];

    $hasil_akhir = array_keys($fire_strength, max($fire_strength))[0];

    // Tampilkan hasil di view
    return view('hasil', compact('hasilAngket', 'kategori_km', 'kategori_rm', 'saran_km', 'saran_rm', 'hasil_akhir'));
    }
}
