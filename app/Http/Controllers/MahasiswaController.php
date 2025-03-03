<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class MahasiswaController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:9|unique:mahasiswas',
            'email' => 'required|string|email|unique:mahasiswas',
            'password' => 'required|string|max:8',  
        ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
        ]);

        // Redirect atau kirim response
        return redirect('/')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nim' => 'required|string',
            'password' => 'required|string',
        ]);
        $mahasiswa = Auth::guard('mahasiswa')->attempt([
            'nim' => $request->nim,
            'password' => $request->password,
        ]);

        if ($mahasiswa) {
            // Login berhasil
            return redirect()->route('angket.home')->with('success', 'Login mahasiswa berhasil.');
        }

        return back()->withErrors(['nim' => 'NIM atau password salah.']);
    }

    // Logout
    public function logout()
    {
        Auth::guard('mahasiswa')->logout();
        return redirect('/')->with('success', 'Anda telah logout.');
    }

    public function index(Request $request)
    {
        $query = Mahasiswa::query();

    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('nim', 'like', '%' . $search . '%')
              ->orWhere('nama', 'like', '%' . $search . '%');
        });
    }

    $mahasiswa = $query->paginate(10);
        return view('mahasiswa', compact('mahasiswa'));
    }
    public function tambah(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:9|unique:mahasiswas',
            'email' => 'required|string|email|unique:mahasiswas',
            'password' => 'required|string|max:8',  
        ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
        ]);

        // Redirect atau kirim response
        return redirect()->route('tampil-mahasiswa')->with('success', 'Registrasi berhasil. Silakan login.');
    }
    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $mahasiswa->delete();
        return redirect()->route('tampil-mahasiswa')->with('success', 'Data berhasil dihapus');
    }
    public function profile()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();

        // Check if mahasiswa is authenticated
        if (!$mahasiswa) {
            return redirect()->route('login.mahasiswa')->with('error', 'Anda harus login terlebih dahulu.');
        }
        return view('layouts.sidebar_mhs', compact('mahasiswa'));
    }
}
