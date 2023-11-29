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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/postLogin', [AuthController::class, 'postLogin'])->name('admin.login');
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/logout', [LogoutadminController::class, 'index'])->name('admin.logoutPage');

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.home');
        Route::get('/jadwalkonseling', [JadwalkonselingController::class, 'index']);
        
        Route::get('/dataremaja', [DataremajaController::class, 'index']);
        Route::get('/tambah', [DataremajaController::class, 'tambah']);
        Route::post('/insert', [DataremajaController::class, 'insert']);
        Route::delete('/deleteremaja/{id}', [DataremajaController::class, 'delete']);

        
        Route::get('/conseling', [CounselingController::class, 'index']);

        
        Route::get('/prokerposyandu',[ProkerposyanduController::class, 'index']);
        Route::get('/tambahproker', [ProkerposyanduController::class, 'tambahproker']);
        Route::post('/insertproker', [ProkerposyanduController::class, 'insertproker']);
        Route::delete('/deleteproker/{id}', [ProkerposyanduController::class, 'delete']);

        Route::get('/kegiatankader', [KegiatankaderController::class, 'index']);
        Route::post('/insertkegiatan', [KegiatankaderController::class, 'insert']);
        Route::get('/tambahkegiatan', [KegiatankaderController::class, 'tambahkegiatan']);
        
        
        Route::get('/profile', [ProfileController::class, 'index']);
        
        Route::get('/conseling', [CounselingController::class, 'index']);
        
        Route::post('/conseling/createOrUpdate', [CounselingController::class, 'createOrUpdate'])->name('admin.createKonseling');
    });
});