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
	// Route::resource('/biodata', 'BiodataController');
	// Route::get('/wisata', function () {
	//     return view('users.front.wisata');
	// });
	
	// Route::get('/profile', function () {
	//     return view('users.front.profile');
	// });
	
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
// Route::get('pdf', function() {
// 	// $pdf = PDF::loadView('pdf');
// 	// return $pdf->download('invoice.pdf');
// 	$pdf = PDF::loadView('pdf');
// 	return $pdf->stream('document.pdf');
// });


