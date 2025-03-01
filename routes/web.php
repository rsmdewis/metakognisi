<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AngketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|-------------------------------------------------------------------------- 
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/angket', function () {
//     return view('angket');
// })->middleware('auth:mahasiswa');
Route::get('/home_mahasiswa', [AngketController::class, 'home'])->name('angket.home')->middleware('auth:mahasiswa');
Route::get('/angket', [AngketController::class, 'show'])->name('angket.show')->middleware('auth:mahasiswa');
Route::get('/angket_hasil', [AngketController::class, 'hasil'])->name('angket.hasil')->middleware('auth:mahasiswa');


Route::get('/angketrm', function () {
    return view('angketrm');
});

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('tampil-mahasiswa');
Route::get('/laporan', function () {
    return view('laporan');
});
Route::get('/grafik', function () {
    return view('grafik');
});
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/home', [AuthController::class, 'home'])->name('home')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/register', [MahasiswaController::class, 'register'])->name('mahasiswa.register');
// Route::get('/loginmahasiswa', [MahasiswaController::class, 'showLoginForm'])->name('login-mahasiswa');
Route::post('/loginmahasiswa', [MahasiswaController::class, 'login'])->name('login-mahasiswa');
Route::post('/logoutmahasiswa', [MahasiswaController::class, 'logout'])->name('logout-mahasiswa');
Route::post('/tambahmahasiswa', [MahasiswaController::class, 'tambah'])->name('tambah-mahasiswa');
Route::delete('/mahasiwa/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.delete');

Route::get('/angketmai', [AngketController::class, 'index'])->name('angket.tampil')->middleware('auth');
Route::post('/tambah-angket', [AngketController::class, 'store'])->name('tambah.angket');
Route::get('/kode-angket', [AngketController::class, 'getKodeAngkets']);
Route::get('/sub-angket/{kodeAngket}', [AngketController::class, 'getSubAngkets']);
Route::put('/angketmai/{id}', [AngketController::class, 'update'])->name('angket.update');
Route::delete('/angketmai/{id}', [AngketController::class, 'destroy'])->name('angket.delete');