<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:9|unique:mahasiswas',
            'email' => [
            'required', 'string', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', 'unique:mahasiswas'
            ],
            'password' => 'required|string|min:6|max:8'
        ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password), 
        ]);

        // Redirect atau kirim response
        return redirect('/')->with('success', 'Registrasi berhasil. Silakan login.');
    }
    public function checkNIM(Request $request)
    {
        $exists = Mahasiswa::where('nim', $request->nim)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function checkEmail(Request $request)
    {
        $exists = Mahasiswa::where('email', $request->email)->exists();
        return response()->json(['exists' => $exists]);
    }

    public function login(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'nim' => 'required|string',
            'password' => 'required|string',
        ]);
    
        if (Auth::guard('mahasiswa')->attempt(['nim' => $request->nim, 'password' => $request->password])) {
            $request->session()->regenerate();

            return redirect()->route('angket.home')->with('success', 'Login mahasiswa berhasil.');
        }

        return back()->withErrors(['password' => 'Password salah.'])->withInput();
    }
    public function checkPassword(Request $request)
    {
        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();
        $correct = $mahasiswa && Hash::check($request->password, $mahasiswa->password);
        return response()->json(['correct' => $correct]);
    }
    public function profile()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        
        if (!$mahasiswa) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        return view('mahasiswa.profile.index', compact('mahasiswa'));
    }

    
    public function updateProfile(Request $request)
{
    $mahasiswa = Auth::guard('mahasiswa')->user();

    if (!$mahasiswa) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $request->validate([
        'nama' => 'required|string|max:255',
        'email' => [
            'required',
            'email',
            Rule::unique('mahasiswas', 'email')->ignore($mahasiswa->id),
        ],
        'password' => 'nullable|min:6',
    ]);

    $mahasiswa->nama = $request->nama;
    $mahasiswa->email = $request->email;

    if ($request->filled('password')) {
        $mahasiswa->password = bcrypt($request->password);
    }

    $mahasiswa->save();

    return redirect()->route('mahasiswa.profile')->with('success', 'Profil berhasil diperbarui.');
}
    public function logout()
    {
        Auth::guard('mahasiswa')->logout();
        // session()->invalidate();
        session()->flash('success', 'Anda telah logout.');
        // session()->regenerateToken();
        return redirect()->route('landingpage')->with('success', 'Anda telah logout.');
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
        return view('admin.mahasiswa.mahasiswa', compact('mahasiswa'));
    }
    public function tambah(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:9|unique:mahasiswas',
            'email' => [
            'required', 'string', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', 'unique:mahasiswas'
            ],
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
    public function edit(Request $request, $nim)
{
    // Cari mahasiswa berdasarkan NIM
    $mahasiswa = Mahasiswa::where('nim', $nim)->firstOrFail();

    // Validasi input
    $request->validate([
        'nama' => 'required|string|max:100',
        'email' => [
            'required', 'string', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/', 
            Rule::unique('mahasiswas')->ignore($mahasiswa->id)
        ],
        'password' => 'nullable|string|max:8',  // Password boleh dikosongkan
    ]);

    // Update data mahasiswa
    $mahasiswa->nama = $request->nama;
    $mahasiswa->email = $request->email;

    // Jika password diisi, hash dan update
    if ($request->filled('password')) {
        $mahasiswa->password = Hash::make($request->password);
    }

    $mahasiswa->save();

    return redirect()->route('tampil-mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
}

    public function destroy($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $mahasiswa->delete();
        return redirect()->route('tampil-mahasiswa')->with('success', 'Data berhasil dihapus');
    }
    // public function profile()
    // {
    //     $mahasiswa = Auth::guard('mahasiswa')->user();

    //     // Check if mahasiswa is authenticated
    //     if (!$mahasiswa) {
    //         return redirect()->route('login.mahasiswa')->with('error', 'Anda harus login terlebih dahulu.');
    //     }
    //     return view('layouts.sidebar_mhs', compact('mahasiswa'));
    // }
}
