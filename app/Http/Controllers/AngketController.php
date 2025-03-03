<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KodeAngket;
use App\Models\SubAngket;
use App\Models\AngketMetakognisi;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;
class AngketController extends Controller
{
    public function index(Request $request)
    {
        $query = AngketMetakognisi::query(); // Assuming your model is 'Angket'

    // Filter by 'search' if it exists
    if ($request->has('search') && $request->search != '') {
        $searchTerm = $request->search;
        $query->where(function($query) use ($searchTerm) {
            $query->where('kode_angket', 'like', '%' . $searchTerm . '%')
                  ->orWhere('kode_subangket', 'like', '%' . $searchTerm . '%')
                  ->orWhere('pertanyaan', 'like', '%' . $searchTerm . '%');
        });
    }

    $angketmetakognisi = $query->paginate(5);
        return view('angketkm', compact('angketmetakognisi'));
    }
    // Mengambil data kode angket
    public function getKodeAngkets()
    {
        $kodeAngkets = KodeAngket::all();
        return response()->json($kodeAngkets);
    }

    // Mengambil data sub angket berdasarkan kode angket
    public function getSubAngkets($kodeAngket)
    {
        $subAngkets = SubAngket::where('kode_angket', $kodeAngket)->get();
        return response()->json($subAngkets);
    }
    public function store(Request $request)
    {
        // Validasi inputan
        // dd($request->all());
        $validated = $request->validate([
            'no' => 'required|integer',
            'kode_angket' => 'required',
            'kode_subangket' => 'required',
            'pertanyaan' => 'required|string',
        ]);

        // Simpan data ke database
        $angket = new AngketMetakognisi();
        $angket->no = $validated['no'];
        $angket->kode_angket = $validated['kode_angket'];
        $angket->kode_subangket = $validated['kode_subangket'];
        $angket->pertanyaan = $validated['pertanyaan'];
        $angket->save();

        return redirect()->route('angket.tampil')->with('success', 'Data Angket berhasil disimpan');
    }
    public function update(Request $request, $id)
    {
        // Validasiasi data yang dikirim dari formulir
        $validatedData = $request->validate([
            'no' => 'required|integer',
            'kode_angket' => 'required',
            'kode_subangket' => 'required',
            'pertanyaan' => 'required|string',
        ]);

        $angketmetakognisi = AngketMetakognisi::where('id', $id)->firstOrFail();
        $angketmetakognisi->update($validatedData);


        // Redirect ke halaman lain atau tampilkan pesan sukses
        return redirect()->route('angket.tampil')->with('success', 'Biodata berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $angketmetakognisi = AngketMetakognisi::where('id', $id)->first();
        $angketmetakognisi->delete();
        return redirect()->route('angket.tampil')->with('success', 'Data berhasil dihapus');
    }

    public function show()
    {
        

        return view('mahasiswa.tes.dashboard');
    }
    public function tes()
    {
        // Ambil semua data angket, termasuk relasi kodeAngket dan subAngket
        $angket = AngketMetakognisi::with(['kodeAngket', 'subAngket'])
        ->get();

        return view('angket', compact('angket'));
    }
    public function home()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();

        // Check if mahasiswa is authenticated
        if (!$mahasiswa) {
            return redirect()->route('login.mahasiswa')->with('error', 'Anda harus login terlebih dahulu.');
        }
        return view('home_mhs', compact('mahasiswa'))->with('mahasiswa', $mahasiswa);
    }
    public function hasil()
    {
        // Ambil semua data angket, termasuk relasi kodeAngket dan subAngket
        $angket = AngketMetakognisi::with(['kodeAngket', 'subAngket'])->get();

        return view('hasil', compact('angket'));
    }

}
