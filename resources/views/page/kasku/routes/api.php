<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('owner')->group( function() {
    Route::post('/', 'Api\OwnerController@post');
    Route::post('/login', 'Api\OwnerController@login');
    Route::put('/{id}', 'Api\OwnerController@put')->middleware('auth:api-owner');
});

Route::prefix('bisnis')->group( function() {
    Route::get('/', 'Api\BisnisController@get');
    Route::post('/', 'Api\BisnisController@post')->middleware('auth:api-owner');
    Route::put('/{id}', 'Api\BisnisController@put')->middleware('auth:api-owner');
    Route::delete('/{id}', 'Api\BisnisController@delete')->middleware('auth:api-owner');
});

Route::prefix('akuntan')->group( function() {
    Route::post('/login', 'Api\AkuntanController@login');
    Route::get('/', 'Api\AkuntanController@get');
    Route::post('/', 'Api\AkuntanController@post')->middleware('auth:api-owner');
    Route::put('/{id}', 'Api\AkuntanController@put')->middleware('auth:api-akuntan');
    Route::delete('/{id}', 'Api\AkuntanController@delete')->middleware('auth:api-owner');
});

Route::prefix('jenis/satuan')->group( function() {
    Route::get('/', 'Api\JenisSatuanController@get');
});

Route::prefix('satuan')->group( function() {
    Route::get('/', 'Api\SatuanController@get');
});

Route::prefix('jenis/transaksi')->group( function() {
    Route::get('/', 'Api\JenisTransaksiController@get');
    Route::get('/item', 'Api\JenisTransaksiController@getWithItem');
    Route::post('/', 'Api\JenisTransaksiController@post')->middleware('auth:api-akuntan');
    Route::put('/{id}', 'Api\JenisTransaksiController@put')->middleware('auth:api-akuntan');
});

Route::prefix('transaksi')->group( function() {
    Route::get('/', 'Api\TransaksiController@get');
    Route::get('/total', 'Api\TransaksiController@total');
    Route::post('/', 'Api\TransaksiController@post')->middleware('auth:api-akuntan');
    Route::put('/{id}', 'Api\TransaksiController@put')->middleware('auth:api-akuntan');
    Route::delete('/{id}', 'Api\TransaksiController@delete')->middleware('auth:api-akuntan');
});

Route::prefix('laporan')->group( function() {
    Route::get('/transaksi/{id_bisnis}', 'Api\LaporanController@transaksi');
    Route::get('/grafik/{id_bisnis}', 'Api\LaporanController@grafik');
});