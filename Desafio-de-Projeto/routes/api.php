<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function() {
//     Route::get('/', 'App\Http\Controllers\BandaController@home')->name('home');
    Route::POST('/salvar', 'App\Http\Controllers\BandaController@salvar')->name('salvar');
    Route::delete('/deletar/{id}', 'App\Http\Controllers\BandaController@deletar')->name('delete');
    Route::put('/edit/{id}', 'App\Http\Controllers\BandaController@editar')->name('edit');
//     Route::get('/bandas', 'App\Http\Controllers\BandaController@verBandas')->name('bandas');

});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
