<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::get('/angket', function () {
    return view('angket');
});
Route::get('/hasil', function () {
    return view('hasil');
});
Route::get('/home', function () {
    return view('admin');
});
Route::get('/log', function () {
    return view('log');
});
Route::get('/angketkm', function () {
    return view('angketkm');
});
Route::get('/angketrm', function () {
    return view('angketrm');
});
Route::get('/mahasiswa', function () {
    return view('mahasiswa');
});
Route::get('/laporan', function () {
    return view('laporan');
});
Route::get('/grafik', function () {
    return view('grafik');
});
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');