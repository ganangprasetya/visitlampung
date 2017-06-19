<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Objekwisata;

use App\User;
use App\Role;

class DashboardController extends Controller
{
    public function index()
    {
    	$halaman = 'dashboard';
        $objekwisata = Objekwisata::all();
        $jumlah_user = Role::where('name','user')->first()->users->count();
        $jumlah_objekwisata = $objekwisata->count();
        // var_dump($jumlah_user);
        return view('admin.index.dashboard', compact('dashboard','jumlah_objekwisata','jumlah_user'));
    }
}
