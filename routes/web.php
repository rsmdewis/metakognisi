<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AngketController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\SaranController;

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
Route::get('/angketmaites', [AngketController::class, 'tes'])->name('angketmai.show')->middleware('auth:mahasiswa');
Route::post('/submitangket', [HasilController::class, 'store'])->name('angket.store')->middleware('auth:mahasiswa');
Route::get('/angket_info', [HasilController::class, 'info'])->name('angket.info')->middleware('auth:mahasiswa');
Route::get('/angket_hasil', [HasilController::class, 'show'])->name('angket.hasil')->middleware('auth:mahasiswa');


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



Route::get('/saran', [SaranController::class, 'index'])->name('saran.tampil')->middleware('auth');
Route::post('/saran/tambah', [SaranController::class, 'store'])->name('tambah.saran');
Route::put('/saran/update/{saran}', [SaranController::class, 'update'])->name('saran.update');
Route::delete('/saran/delete/{saran}', [SaranController::class, 'destroy'])->name('saran.delete');
Route::get('/kode-angket', [SaranController::class, 'getKodeAngket']);
