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
Route::group(['middleware'=>'auth'], function() {
	Route::resource('/', 'KategoriController');
	Route::get('/wisata', function () {
	    return view('users.front.wisata');
	});
	
	Route::get('/profile', function () {
	    return view('users.front.profile');
	});
	
});
Route::get('/searchbymap', function () {
	    return view('users.front.searchbymap');
	});

Auth::routes();
Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin','middleware'=>['auth','role:admin|kepaladinas']], function(){
	// Route::get('/', function () {
	// 	$halaman = 'dashboard';
	//     return view('admin.index.dashboard', compact('halaman'));
	// });
	Route::resource('/', 'DashboardController');

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
	Route::resource('transaksi', 'TransaksiController');

	Route::resource('backup', 'BackupController');

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



//test cetak PDF
Route::get('pdf', function() {
	// $pdf = PDF::loadView('pdf');
	// return $pdf->download('invoice.pdf');
	$pdf = PDF::loadView('pdf');
	return $pdf->stream('document.pdf');
});


