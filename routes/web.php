<?php

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

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    Route::get('/jadwalkonseling', function () {
        return view('admin.jadwalkonseling');
    });

    Route::get('/dataremaja', function () {
        return view('admin.dataremaja');
    });

    Route::get('/prokerposyandu', function () {
        return view('admin.prokerposyandu');
    });

    Route::get('/jumlahdata', function () {
        return view('admin.jumlahdata');
    });

    Route::get('/profile', function () {
        return view('admin.profile');
    });

    Route::get('/kegiatankader', function () {
        return view('admin.kegiatankader');
    });

    Route::get('/logout', function () {
        return view('admin.logout');
    });
});

