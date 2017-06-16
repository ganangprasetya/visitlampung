<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Objekwisata;

class DashboardController extends Controller
{
    public function index()
    {
    	$halaman = 'dashboard';
        $objekwisata = Objekwisata::all();
        $jumlah_objekwisata = $objekwisata->count();
        return view('admin.index.dashboard', compact('dashboard','jumlah_objekwisata'));
    }
}
