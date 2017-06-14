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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin', function () {
	$halaman = 'dashboard';
    return view('admin.index.dashboard', compact('halaman'));
});

Route::get('/admin/data/objekwisata', function () {
	$halaman = 'objekwisata';
    return view('admin.objekwisata.index', compact('halaman'));
});

Route::get('/admin/data/users', function () {
	$halaman = 'users';
    return view('admin.users.index', compact('halaman'));
});

Route::get('/admin/transaksi', function () {
	$halaman = 'transaksi';
    return view('admin.transaksi.index', compact('halaman'));
});





Auth::routes();

Route::get('/home', 'HomeController@index');
