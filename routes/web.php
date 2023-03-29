<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'home']);
Route::get('/dada', [HomeController::class, 'dada']);

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin']);

Route::get('/loginsiswa', [LoginController::class, 'loginsiswa'])->name('loginsiswa');
Route::post('actionsiswa', [LoginController::class, 'actionsiswa']);

Route::resource('siswa', SiswaController::class)->middleware('auth');


Route::get('/logout', [LoginController::class, 'logout']);



