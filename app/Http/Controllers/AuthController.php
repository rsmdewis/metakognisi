<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\AngketMetakognisi;
use App\Models\Mahasiswa;

class AuthController extends Controller
{
    public function index()
    {
        return view('log');
    }

    public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        $user = Auth::user();
        if ($user) {
            return redirect()->route('home');
        }
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}

    public function home()
    {
    $jumlahAngket = AngketMetakognisi::count(); // Menghitung jumlah angket
    $jumlahMahasiswa = Mahasiswa::count(); // Menghitung jumlah mahasiswa

    return view('admin', compact('jumlahAngket', 'jumlahMahasiswa'));
    }

    public function logout(Request $request)
{
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login');
}
}
