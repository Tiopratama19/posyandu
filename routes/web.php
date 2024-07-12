<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutadminController;
use App\Http\Controllers\DataremajaController;
use App\Http\Controllers\JadwalkonselingController;
use App\Http\Controllers\KegiatankaderController;
use App\Http\Controllers\LoginadminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProkerposyanduController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Master\CounselingController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\Laporan\DataRemajaController as RemajaController;

// Add 16/12/2023
use App\Http\Controllers\Users\{
    LandingController
};
// End


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
//Add 16/12/2023
Route::get('/', [LandingController::class, 'index']);
//End

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('admin.login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/logout', [LogoutadminController::class, 'index'])->name('admin.logoutPage');

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.home');


        Route::get('/dataremaja', [DataremajaController::class, 'index'])->name('dataremaja');
        Route::get('/tambah', [DataremajaController::class, 'tambah'])->name('tambah');
        Route::post('/insert', [DataremajaController::class, 'insert'])->name('insert');
        Route::get('/tampildata/{id}', [DataremajaController::class, 'tampildata'])->name('tampildata');
        Route::post('/updatedata/{id}', [DataremajaController::class, 'updatedata'])->name('upadatedata');
        Route::get('/deletedata/{id}', [DataremajaController::class, 'deletedata'])->name('deletedata');


        Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat');
        Route::get('/tambahriwayat', [RiwayatController::class, 'tambah'])->name('tambahriwayat');
        Route::post('/insertriwayat', [RiwayatController::class, 'insert'])->name('insertriwayat');
        Route::get('/tampilriwayat/{id}', [RiwayatController::class, 'tampildata'])->name('tampilriwayat');
        Route::post('/updateriwayat/{id}', [RiwayatController::class, 'updatedata'])->name('upadateriwayat');
        Route::get('/deleteriwayat/{id}', [RiwayatController::class, 'deletedata'])->name('deleteriwayat');
        Route::get('/riwayat/{id}', [RiwayatController::class, 'riwayatdetail'])->name('riwayatdetail');

        Route::get('/jadwalkonseling', [JadwalkonselingController::class, 'index'])->name('jadwalkonseling');
        Route::get('/tambahjadwal', [JadwalkonselingController::class, 'tambah'])->name('tambahjadwal');
        Route::post('/insertjadwal', [JadwalkonselingController::class, 'insert'])->name('insertjadwal');
        Route::get('/tampiljadwal/{id}', [JadwalkonselingController::class, 'tampildata'])->name('tampiljadwal');
        Route::post('/updatejadwal/{id}', [JadwalkonselingController::class, 'updatedata'])->name('upadatejadwal');
        Route::get('/deletejadwal/{id}', [JadwalkonselingController::class, 'deletedata'])->name('deletejadwal');


        Route::get('/prokerposyandu',[ProkerposyanduController::class, 'index'])->name('prokerposyandu');
        Route::get('/tambahproker', [ProkerposyanduController::class, 'tambah'])->name('tambahproker');
        Route::post('/insertproker', [ProkerposyanduController::class, 'insert'])->name('insertproker');
        Route::get('/tampilproker/{id}', [ProkerposyanduController::class, 'tampildata'])->name('tampilproker');
        Route::post('/updateproker/{id}', [ProkerposyanduController::class, 'updatedata'])->name('upadateproker');
        Route::get('/deleteproker/{id}', [ProkerposyanduController::class, 'deletedata'])->name('deleteproker');


        Route::get('/kegiatankader', [KegiatankaderController::class, 'index'])->name('kegiatankader');
        Route::get('/tambahkegiatan', [KegiatankaderController::class, 'tambah'])->name('tambahkegiatan');
        Route::post('/insertkegiatan', [KegiatankaderController::class, 'insert'])->name('insertkegiatan');
        Route::get('/tampilkegiatan/{id}', [KegiatankaderController::class, 'tampildata'])->name('tampilkegiatan');
        Route::post('/updatekegiatan/{id}', [KegiatankaderController::class, 'updatedata'])->name('updatekegiatan');
        Route::get('/deletekegiatan/{id}', [KegiatankaderController::class, 'deletedata'])->name('deletekegiatan');

        Route::get('/profile', [ProfileController::class, 'index']);


        Route::get('/filterdataremaja', [DataremajaController::class, 'filterGetDataRemaja']);

     });
            Route::prefix('laporan')->group(function () {
                Route::get('/dataremaja/{tglawal}/{tglakhir}', [RemajaController::class, 'downloadDataremaja']);
                Route::get('/dataremaja/generate/{filename}', [RemajaController::class, 'generate'])->name('download.pdf');

            });
    }
);
