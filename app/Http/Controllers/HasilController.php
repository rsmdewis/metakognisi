<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HasilAngket;
use App\Models\AngketMetakognisi;
use App\Models\SaranMetakognisi;
use App\Models\Mahasiswa;
use Barryvdh\DomPDF\Facade\Pdf;
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

    if (!$mahasiswa) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $hasilAngket = HasilAngket::where('nim', $mahasiswa->nim)->first();

    if (!$hasilAngket) {
        return view('mahasiswa.hasil.hasil', ['hasilAngket' => null]);
    }

    // Menentukan kategori KM dan RM
    $kategori_km = array_keys([
        'rendah' => $hasilAngket->km_rendah,
        'sedang' => $hasilAngket->km_sedang,
        'tinggi' => $hasilAngket->km_tinggi
    ], max($hasilAngket->km_rendah, $hasilAngket->km_sedang, $hasilAngket->km_tinggi))[0];

    $kategori_rm = array_keys([
        'rendah' => $hasilAngket->rm_rendah,
        'sedang' => $hasilAngket->rm_sedang,
        'tinggi' => $hasilAngket->rm_tinggi
    ], max($hasilAngket->rm_rendah, $hasilAngket->rm_sedang, $hasilAngket->rm_tinggi))[0];

    // Ambil saran dari database
    $saran_km = SaranMetakognisi::where('kategori', ucfirst($kategori_km))->where('kode_angket', 'KM')->value('saran');
    $saran_rm = SaranMetakognisi::where('kategori', ucfirst($kategori_rm))->where('kode_angket', 'RM')->value('saran');

    

    // Kategori akhir berdasarkan fire strength
    $fire_strength = [
        'rendah' => min($hasilAngket->km_rendah, $hasilAngket->rm_rendah),
        'sedang' => min($hasilAngket->km_sedang, $hasilAngket->rm_sedang),
        'tinggi' => min($hasilAngket->km_tinggi, $hasilAngket->rm_tinggi)
    ];

    $hasil_akhir = array_keys($fire_strength, max($fire_strength))[0];

    return view('hasil', compact('hasilAngket', 'kategori_km', 'kategori_rm', 'saran_km', 'saran_rm', 'hasil_akhir'));
}
public function generatePDF()
{
    $mahasiswa = Auth::guard('mahasiswa')->user();

        if (!$mahasiswa) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $hasilAngket = HasilAngket::where('nim', $mahasiswa->nim)->first();

        if (!$hasilAngket) {
            return redirect()->route('hasil')->with('error', 'Hasil angket tidak ditemukan.');
        }

        $kategori_km = array_keys([
            'rendah' => $hasilAngket->km_rendah,
            'sedang' => $hasilAngket->km_sedang,
            'tinggi' => $hasilAngket->km_tinggi
        ], max($hasilAngket->km_rendah, $hasilAngket->km_sedang, $hasilAngket->km_tinggi))[0];

        $kategori_rm = array_keys([
            'rendah' => $hasilAngket->rm_rendah,
            'sedang' => $hasilAngket->rm_sedang,
            'tinggi' => $hasilAngket->rm_tinggi
        ], max($hasilAngket->rm_rendah, $hasilAngket->rm_sedang, $hasilAngket->rm_tinggi))[0];

        $saran_km = SaranMetakognisi::where('kategori', ucfirst($kategori_km))->where('kode_angket', 'KM')->value('saran');
        $saran_rm = SaranMetakognisi::where('kategori', ucfirst($kategori_rm))->where('kode_angket', 'RM')->value('saran');


        $fire_strength = [
            'rendah' => min($hasilAngket->km_rendah, $hasilAngket->rm_rendah),
            'sedang' => min($hasilAngket->km_sedang, $hasilAngket->rm_sedang),
            'tinggi' => min($hasilAngket->km_tinggi, $hasilAngket->rm_tinggi)
        ];

        $hasil_akhir = array_keys($fire_strength, max($fire_strength))[0];

        $pdf = PDF::loadView('mahasiswa.hasil.download', compact('mahasiswa', 'hasilAngket', 'kategori_km', 'kategori_rm', 'saran_km', 'saran_rm', 'hasil_akhir'));
        return $pdf->download('Hasil_Angket_' . $mahasiswa->nim . '.pdf');
}
public function laporan(Request $request)
    {
        // Ambil semua data hasil angket dari database
        $hasilAngket = HasilAngket::all();

        $data = $hasilAngket->map(function ($item) {
            // Ambil nama mahasiswa berdasarkan NIM
            $mahasiswa = Mahasiswa::where('nim', $item->nim)->first();
            $nama = $mahasiswa ? $mahasiswa->nama : 'Tidak Diketahui';

            // Tentukan kategori KM
            $kategori_km = array_keys([
                'rendah' => $item->km_rendah,
                'sedang' => $item->km_sedang,
                'tinggi' => $item->km_tinggi
            ], max($item->km_rendah, $item->km_sedang, $item->km_tinggi))[0];

            // Tentukan kategori RM
            $kategori_rm = array_keys([
                'rendah' => $item->rm_rendah,
                'sedang' => $item->rm_sedang,
                'tinggi' => $item->rm_tinggi
            ], max($item->rm_rendah, $item->rm_sedang, $item->rm_tinggi))[0];

            // Tentukan kategori Metakognisi
            $fire_strength = [
                'rendah' => min($item->km_rendah, $item->rm_rendah),
                'sedang' => min($item->km_sedang, $item->rm_sedang),
                'tinggi' => min($item->km_tinggi, $item->rm_tinggi)
            ];
            $hasil_akhir = array_keys($fire_strength, max($fire_strength))[0];

            return [
                'nim' => $item->nim,
                'nama' => $nama,
                'nilai_km' => $item->nilai_km,
                'kategori_km' => ucfirst($kategori_km),
                'nilai_rm' => $item->nilai_rm,
                'kategori_rm' => ucfirst($kategori_rm),
                'metakognisi' => ucfirst($hasil_akhir)
            ];
        }); 
        $search = $request->input('search');
        $filter_km = $request->input('filter_km');
        $filter_rm = $request->input('filter_rm');
        $filter_metakognisi = $request->input('filter_metakognisi');

        if ($search) {
            $data = $data->filter(function ($item) use ($search) {
                return stristr($item['nim'], $search) || stristr($item['nama'], $search);
            });
        }

        if ($filter_km) {
            $data = $data->where('kategori_km', ucfirst($filter_km));
        }

        if ($filter_rm) {
            $data = $data->where('kategori_rm', ucfirst($filter_rm));
        }

        if ($filter_metakognisi) {
            $data = $data->where('metakognisi', ucfirst($filter_metakognisi));
        }

        return view('admin.laporan.laporan', compact('data', 'search', 'filter_km', 'filter_rm', 'filter_metakognisi'));
    }
    public function downloadPdf(Request $request)
{
    // Ambil semua data hasil angket
    $hasilAngket = HasilAngket::all();

    $data = $hasilAngket->map(function ($item) {
        $mahasiswa = Mahasiswa::where('nim', $item->nim)->first();
        $nama = $mahasiswa ? $mahasiswa->nama : 'Tidak Diketahui';
        $email = $mahasiswa ? $mahasiswa->email : 'Tidak Diketahui';

        $kategori_km = array_keys([
            'rendah' => $item->km_rendah,
            'sedang' => $item->km_sedang,
            'tinggi' => $item->km_tinggi
        ], max($item->km_rendah, $item->km_sedang, $item->km_tinggi))[0];

        $kategori_rm = array_keys([
            'rendah' => $item->rm_rendah,
            'sedang' => $item->rm_sedang,
            'tinggi' => $item->rm_tinggi
        ], max($item->rm_rendah, $item->rm_sedang, $item->rm_tinggi))[0];

        $fire_strength = [
            'rendah' => min($item->km_rendah, $item->rm_rendah),
            'sedang' => min($item->km_sedang, $item->rm_sedang),
            'tinggi' => min($item->km_tinggi, $item->rm_tinggi)
        ];
        $hasil_akhir = array_keys($fire_strength, max($fire_strength))[0];

        return [
            'nim' => $item->nim,
            'nama' => $nama,
            'nilai_km' => $item->nilai_km,
            'kategori_km' => ucfirst($kategori_km),
            'nilai_rm' => $item->nilai_rm,
            'kategori_rm' => ucfirst($kategori_rm),
            'metakognisi' => ucfirst($hasil_akhir)
        ];
    });

    // FILTER DATA JIKA ADA REQUEST
    $search = $request->input('search');
    $filter_km = $request->input('filter_km');
    $filter_rm = $request->input('filter_rm');
    $filter_metakognisi = $request->input('filter_metakognisi');

    if ($search) {
        $data = $data->filter(function ($item) use ($search) {
            return stristr($item['nim'], $search) || stristr($item['nama'], $search);
        });
    }

    if ($filter_km) {
        $data = $data->where('kategori_km', ucfirst($filter_km));
    }

    if ($filter_rm) {
        $data = $data->where('kategori_rm', ucfirst($filter_rm));
    }

    if ($filter_metakognisi) {
        $data = $data->where('metakognisi', ucfirst($filter_metakognisi));
    }

    // Generate PDF
    $pdf = Pdf::loadView('admin.laporan.pdf', compact('data'));

    // Return PDF untuk didownload
    return $pdf->download('laporan_metakognisi.pdf');
}


}
