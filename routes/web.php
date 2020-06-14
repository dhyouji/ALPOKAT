<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/firebase','FirebaseController@index');
Route::view('/','login');
Route::resource('barang','BarangController');
Route::resource('/user','UserController');
Route::resource('/produk','ProdukController');
Route::view('/utama','utama');
Route::view('/kasir','kasir');
Route::view('/penjualan','penjualan');
Route::view('/riwayat', 'riwayat');            