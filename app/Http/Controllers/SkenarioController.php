<?php

namespace App\Http\Controllers;
use App\Models\Skenario;
use Illuminate\Http\Request;

class SkenarioController extends Controller
{
    public function index()
    {
        $skenarios = Skenario::all();
        return view('admin.skenario.index', compact('skenarios'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'skenario' => 'required|string',
        ]);

         Skenario::create([
            'skenario' => $request->skenario,
        ]);
        
        

        return redirect()->route('admin.skenario.index')->with('success', 'Skenario berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'skenario' => 'required',
        ]);

        $skenario = Skenario::findOrFail($id);
        $skenario->update([
            'skenario' => $request->skenario,
        ]);

        return redirect()->route('admin.skenario.index')->with('success', 'Skenario berhasil diperbarui!');
    }
}
