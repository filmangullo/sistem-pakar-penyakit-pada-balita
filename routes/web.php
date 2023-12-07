<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PengetahuanController;
use App\Http\Controllers\PenyakitController;
use Illuminate\Support\Facades\Route;
use PharIo\Manifest\AuthorCollection;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'do_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware('auth')->group(function () {
  Route::get('/penyakit', [PenyakitController::class, 'index']);
  Route::get('/penyakit/create', [PenyakitController::class, 'create']);
  Route::post('/penyakit', [PenyakitController::class, 'store']);
  Route::get('/penyakit/edit/{id}', [PenyakitController::class, 'edit']);
  Route::put('/penyakit/{id}', [PenyakitController::class, 'update']);
  Route::delete('/penyakit/{id}', [PenyakitController::class, 'destroy']);

  Route::get('/gejala', [GejalaController::class, 'index']);
  Route::get('/gejala/create', [GejalaController::class, 'create']);
  Route::post('/gejala', [GejalaController::class, 'store']);
  Route::get('/gejala/edit/{id}', [GejalaController::class, 'edit']);
  Route::put('/gejala/{id}', [GejalaController::class, 'update']);
  Route::delete('/gejala/{id}', [GejalaController::class, 'destroy']);

  Route::get('/pengetahuan', [PengetahuanController::class, 'index']);
  Route::get('/pengetahuan/create', [PengetahuanController::class, 'create']);
  Route::post('/pengetahuan', [PengetahuanController::class, 'store']);
  Route::get('/pengetahuan/edit/{id}', [PengetahuanController::class, 'edit']);
  Route::put('/pengetahuan', [PengetahuanController::class, 'update']);
  Route::delete('/pengetahuan/{id}', [PengetahuanController::class, 'destroy']);

  Route::get('/riwayat_diagnosa', [DiagnosaController::class, 'index']);
});

Route::get('/about', [HomeController::class, 'about']);

Route::get('/diagnosa', [DiagnosaController::class, 'create']);
Route::post('/diagnosa', [DiagnosaController::class, 'store']);
Route::get('/diagnosa/{id}', [DiagnosaController::class, 'show']);
