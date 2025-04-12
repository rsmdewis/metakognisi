<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaranMetakognisi;
use App\Models\KodeAngket;

class SaranController extends Controller
{
    public function index(Request $request)
    {
        $query = SaranMetakognisi::query();
        
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('kode_angket', 'like', "%$search%")
                ->orWhere('kategori', 'like', "%$search%");
        }

        $saranmetakognisi = $query->paginate(2);
        return view('admin.saran.index', compact('saranmetakognisi'));
    }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'kode_angket' => 'required|exists:kode_angkets,kode_angket',
    //         'kategori' => 'required|in:Rendah,Sedang,Tinggi',
    //         'saran' => 'required|array|min:1', // Pastikan 'saran' adalah array dan minimal 1 input
    //         'saran.*' => 'required|string' // Setiap elemen array 'saran' harus valid
    //     ]);
    //     $gabunganSaran = implode('; ', array_map('trim', $request->saran));

    //     SaranMetakognisi::create([
    //         'kode_angket' => $request->kode_angket,
    //         'kategori' => $request->kategori,
    //         'saran' => $gabunganSaran
    //     ]);
    //     return redirect()->route('saran.tampil')->with('success', 'Saran berhasil ditambahkan!');
    // }

    public function update(Request $request, $id)
    {
        $request->validate([
            'saran' => 'required|string' 
        ]);

        $saran = SaranMetakognisi::findOrFail($id);
        $saran->update([
            'saran' => $request->saran
        ]);
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
