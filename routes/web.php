<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->group(function () {
  Route::get('/', [DashboardController::class, 'index']);
  Route::post('/submit-dospem', [DashboardController::class, 'submitDospem']);
  Route::get('/daftar-dosen', [DashboardController::class, 'daftarDosen']);
  Route::get('/logout', [DashboardController::class, 'logout']);
});


Route::get('/register', [DashboardController::class, 'register']);
Route::post('/register', [DashboardController::class, 'registerPost']);
Route::get('/login', [DashboardController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [DashboardController::class, 'loginPost']);
