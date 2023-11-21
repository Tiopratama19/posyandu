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
use App\Models\Dataremaja;

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
        Route::get('/prokerposyandu', [ProkerposyanduController::class, 'index']);
        Route::get('/profile', [ProfileController::class, 'index']);
        Route::get('/kegiatankader', [KegiatankaderController::class, 'index']);
        Route::get('/conseling', [CounselingController::class, 'index']);
        Route::get('/tambah', [DataremajaController::class, 'tambah']);
        Route::post('/insert', [DataremajaController::class, 'insert']);
        Route::post('/conseling/createOrUpdate', [CounselingController::class, 'createOrUpdate'])->name('admin.createKonseling');
    });
});