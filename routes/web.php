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

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin'], function(){
	Route::get('/', function () {
		$halaman = 'dashboard';
	    return view('admin.index.dashboard', compact('halaman'));
	});

	Route::group(['prefix'=>'data'], function(){

		Route::group(['prefix'=>'objekwisata'], function(){
			Route::resource('kabupaten', 'KabupatenController');
			Route::resource('jenisobjekwisata', 'JenisobjekwisataController');
			Route::resource('kecamatan', 'KecamatanController');
			Route::get('lokasi/lokasi-ajax', 'LokasiController@ajax');
			Route::resource('lokasi', 'LokasiController');
		});
		Route::resource('objekwisata', 'ObjekwisataController');
		Route::get('users', function () {
			$halaman = 'users';
		    return view('admin.users.index', compact('halaman'));
		});
	});
	Route::get('transaksi', function () {
		$halaman = 'transaksi';
	    return view('admin.transaksi.index', compact('halaman'));
	});

	Route::get('backup', function () {
		$halaman = 'backup';
	    return view('admin.backup.index', compact('halaman'));
	});

});



// Route::get('/admin/data/objekwisata', function () {
// 	$halaman = 'objekwisata';
//     return view('admin.objekwisata.index', compact('halaman'));
// });


// Route::resource('/admin/data/objekwisata/kabupaten', 'KabupatenController');

// Route::resource('/admin/data/objekwisata/jenisobjekwisata', 'JenisobjekwisataController');

// Route::resource('/admin/data/objekwisata/kecamatan', 'KecamatanController');

// Route::resource('/admin/data/objekwisata/lokasi', 'LokasiController');

// Route::resource('/admin/data/objekwisata', 'ObjekwisataController');

// Route::resource('/admin/data/objekwisata/kabupaten', 'KabupatenController');
// Route::get('/admin/data/objekwisata/kabupaten', [
// 	'use' => 'KabupatenController@index',
// 	'as' => 'kabupaten.index'
// ]);


// Route::get('/admin/data/users', function () {
// 	$halaman = 'users';
//     return view('admin.users.index', compact('halaman'));
// });

// Route::get('/admin/transaksi', function () {
// 	$halaman = 'transaksi';
//     return view('admin.transaksi.index', compact('halaman'));
// });






