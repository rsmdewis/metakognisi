<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\AngketController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\SaranController;
use App\Http\Controllers\SkenarioController;


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
})->name('landingpage');
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [MahasiswaController::class, 'register'])->name('mahasiswa.register');
Route::post('/loginmahasiswa', [MahasiswaController::class, 'login'])->name('login-mahasiswa');
Route::get('/check-nim', [MahasiswaController::class, 'checkNIM']);
Route::get('/check-email', [MahasiswaController::class, 'checkEmail']);
Route::get('/check-password', [MahasiswaController::class, 'checkPassword']);

Route::middleware(['auth:mahasiswa'])->group(function () {
    Route::get('/home_mahasiswa', [AngketController::class, 'home'])->name('angket.home');
    Route::get('/angket', [AngketController::class, 'show'])->name('angket.show');
    Route::get('/angketmaites', [AngketController::class, 'tes'])->name('angketmai.show');
    Route::post('/submitangket', [HasilController::class, 'store'])->name('angket.store');
    Route::get('/angket_info', [HasilController::class, 'info'])->name('angket.info');
    Route::get('/angket_hasil', [HasilController::class, 'show'])->name('angket.hasil');
    Route::get('/angket_hasil/pdf', [HasilController::class, 'generatePDF'])->name('hasil.pdf');
    Route::get('/profile-mahasiswa', [MahasiswaController::class, 'profile'])->name('mahasiswa.profile');
    Route::post('/update-profile', [MahasiswaController::class, 'updateProfile'])->name('mahasiswa.updateProfile');
});



Route::get('/angketrm', function () {
    return view('angketrm');
});

//admin
Route::get('/home', [AuthController::class, 'home'])->name('home')->middleware('auth');

Route::get('/angketmai', [AngketController::class, 'index'])->name('angket.tampil')->middleware('auth');
Route::post('/tambah-angket', [AngketController::class, 'store'])->name('tambah.angket');
Route::get('/check-no', [AngketController::class, 'checkNo']);
Route::get('/kode-angket', [AngketController::class, 'getKodeAngkets']);
Route::get('/sub-angket/{kodeAngket}', [AngketController::class, 'getSubAngkets']);
Route::put('/angketmai/update/{id}', [AngketController::class, 'update'])->name('angket.update');
Route::delete('/angketmai/{id}', [AngketController::class, 'destroy'])->name('angket.delete');

Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('tampil-mahasiswa');
Route::post('/profile-mahasiswa', [MahasiswaController::class, 'profile'])->name('mahasiswa.profile');
Route::post('/profile-mahasiswa/edit', [MahasiswaController::class, 'profile'])->name('mahasiswa.profile.edit');
Route::post('/logoutmahasiswa', [MahasiswaController::class, 'logout'])->name('logout-mahasiswa');
Route::post('/tambahmahasiswa', [MahasiswaController::class, 'tambah'])->name('tambah-mahasiswa');
Route::post('/edit-mahasiswa/{nim}', [MahasiswaController::class, 'edit'])->name('edit-mahasiswa');
Route::delete('/mahasiwa/{nim}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.delete');

Route::get('/skenario', [SkenarioController::class, 'index'])->name('admin.skenario.index');
Route::post('/skenario', [SkenarioController::class, 'store'])->name('admin.skenario.store');
Route::put('/skenario/{id}', [SkenarioController::class, 'update'])->name('admin.skenario.update');

Route::get('/saran', [SaranController::class, 'index'])->name('saran.tampil')->middleware('auth');
Route::post('/saran/tambah', [SaranController::class, 'store'])->name('tambah.saran');
Route::put('/saran/update/{saran}', [SaranController::class, 'update'])->name('saran.update');
Route::delete('/saran/delete/{saran}', [SaranController::class, 'destroy'])->name('saran.delete');
Route::get('/kode-angket', [SaranController::class, 'getKodeAngket']);

Route::get('/laporan', [HasilController::class, 'laporan'])->name('laporan.hasil');
Route::get('/laporan/download', [HasilController::class, 'downloadPdf'])->name('laporan.download');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




// Route::get('/grafik', function () {
//     return view('grafik');
// });




// Route::get('/loginmahasiswa', [MahasiswaController::class, 'showLoginForm'])->name('login-mahasiswa');










