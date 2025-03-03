<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Saran;
use App\Models\KodeAngket;

class SaranController extends Controller
{
    public function index(Request $request)
    {
        $query = Saran::query();
        
        if ($request->has('search')) {
            $query->where('saran', 'like', '%' . $request->search . '%');
        }

        $saranmetakognisi = $query->paginate(2);
        return view('admin.saran.index', compact('saranmetakognisi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_angket' => 'required|exists:kode_angkets,kode_angket',
            'kategori' => 'required|in:Rendah,Sedang,Tinggi',
            'saran' => 'required|array|min:1', // Pastikan 'saran' adalah array dan minimal 1 input
            'saran.*' => 'required|string|max:255' // Setiap elemen array 'saran' harus valid
        ]);
        $gabunganSaran = implode('; ', array_map('trim', $request->saran));

        Saran::create([
            'kode_angket' => $request->kode_angket,
            'kategori' => $request->kategori,
            'saran' => $gabunganSaran
        ]);
        return redirect()->route('saran.tampil')->with('success', 'Saran berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_angket' => 'required|exists:kode_angkets,kode_angket',
            'kategori' => 'required|in:Rendah,Sedang,Tinggi',
            'saran' => 'required|array|min:1', // Pastikan 'saran' adalah array dan minimal 1 input
            'saran.*' => 'required|string|max:255' // Setiap elemen array 'saran' harus valid
        ]);
        $gabunganSaran = implode('; ', array_map('trim', $request->saran));

        $saran = Saran::findOrFail($id);
        $saran->kode_angket = $request->kode_angket;
        $saran->kategori = $request->kategori;
        $saran->saran = $gabunganSaran; 

        $saran->save();
        return redirect()->route('saran.tampil')->with('success', 'Saran berhasil diperbarui!');
    }

    public function destroy(Saran $saran)
    {
        $saran->delete();
        return redirect()->route('saran.tampil')->with('success', 'Saran berhasil dihapus!');
    }

    public function getKodeAngket()
    {
        return response()->json(KodeAngket::select('kode_angket', 'nama')->get());
    }
}
