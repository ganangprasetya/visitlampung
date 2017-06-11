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

Route::get('/admin', function () {
    return view('index');
});
Route::get('/admin/detailobjekwisata', function () {
    $halaman = 'detailobjekwisata';
    $detailobjekwisata = ['Pantai Mutun', 'Pantai Klara', 'Pantai C'];
    return view('detailobjekwisata', compact('halaman', 'detailobjekwisata'));
});

