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
Route::prefix('admin')->group(function() {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    Route::get('/jadwalkonseling', [JadwalkonselingController::class, 'index']);
    
    Route::get('/dataremaja', [DataremajaController::class, 'index']);
    
    Route::get('/prokerposyandu', [ProkerposyanduController::class, 'index']);
    
    Route::get('/profile', [ProfileController::class, 'index']);

    Route::get('/kegiatankader', [KegiatankaderController::class, 'index']);
    
    Route::get('/login', [LoginadminController::class, 'index']);

    Route::get('/logout', [LogoutadminController::class, 'index']);
});