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

Route::get('/', 'App\Http\Controllers\BandaController@home')->name('home');
Route::get('/cadastrar', 'App\Http\Controllers\BandaController@cadastrar')->name('cadastrar');
Route::get('/alterar', 'App\Http\Controllers\BandaController@alterar')->name('alterar');
Route::get('/bandas', 'App\Http\Controllers\BandaController@verBandas')->name('bandas');
