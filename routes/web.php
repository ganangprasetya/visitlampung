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
setlocale(LC_TIME, 'id');
Route::group(['middleware'=>'auth'], function() {
	Route::get('/', function() {
		return redirect()->route('kategori.index');
	});
	Route::get('setting/password','SettingController@editPassword');
	Route::post('setting/password','SettingController@updatePassword');
	Route::get('kategori/wisata/{wisata}', 'WisataController@show')->name('kategori.wisata.show');
	Route::resource('kategori/wisata/navigasi', 'NavigasiController');
	Route::resource('kategori', 'KategoriController');
	Route::resource('biodata', 'BiodataController');
	Route::get('/searchbymap', function () {
	    return view('users.front.searchbymap');
	});
	Route::get('/navigasi', function () {
	    return view('users.front.navigasi');
	});
});

Auth::routes();
Route::get('/home', 'HomeController@index');
Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin|kepaladinas']], function(){
	Route::resource('/', 'DashboardController');
	Route::get('backup','BackupController@index');
	Route::post('backup','BackupController@export');
	Route::get('password','SettingController@editPasswordAdmin');
	Route::post('password','SettingController@updatePasswordAdmin');
	Route::group(['prefix'=>'data'], function(){
		Route::group(['prefix'=>'objekwisata'], function(){
			Route::resource('kabupaten', 'KabupatenController');
			Route::resource('jenisobjekwisata', 'JenisobjekwisataController');
			Route::resource('kecamatan', 'KecamatanController');
			Route::get('lokasi/lokasi-ajax', 'LokasiController@ajax');
			Route::resource('lokasi', 'LokasiController');
		});
		Route::resource('objekwisata', 'ObjekwisataController');
		Route::resource('users', 'UsersController');
	});
	Route::get('transaksi/pdf', 'TransaksiController@pdf')->name('transaksi.pdf');
	Route::resource('transaksi', 'TransaksiController');
});


