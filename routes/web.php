<?php

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

Route::get('/', 'awal@index');
Route::post('/pushData','awal@toko');

Route::get('/login', 'login@index');
Route::post('/daftar','login@register');
Route::post('/masuk','login@masuk');
Route::get('/keluar','login@keluar');
Route::post('/AddCart','order@order');
Route::get('/keranjang','order@keranjang');
