<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
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

// FRONTEND
Route::get('/', function () {
    return view('FRONTEND.home');
});
Route::get('/berita', function () {
    return view('FRONTEND.berita');
});
Route::get('/detailberita', function () {
    return view('FRONTEND.detailberita');
});
Route::get('/prestasi', function () {
    return view('FRONTEND.prestasi');
});
Route::get('/tentang', function () {
    return view('FRONTEND.tentang');
});
Route::get('/ekstra', function () {
    return view('FRONTEND.ekstra');
});




Route::get('/login', function () {
    return view('BACKEND.login');
});

Route::get('/backoffice', [AdminController::class, 'backoffice'])->name('backoffice');
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

