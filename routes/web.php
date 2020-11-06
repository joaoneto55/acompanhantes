<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\DashboardController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/', [AnuncioController::class, 'index']);
Route::get('/anuncios', [AnuncioController::class, 'index']);
Route::get('/user/anuncios', [DashboardController::class, 'index']);
Route::get('/user/logout', [DashboardController::class, 'logout']);
Route::get('/importa', [AnuncioController::class, 'importaJSON']);
Route::get('/pesquisa', [AnuncioController::class, 'pesquisa']);
Route::get('/acompanhante/{id}', [AnuncioController::class, 'getAnuncio'])->name('id')->where('id', '[0-9]+');
