<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Objekwisata;

class WisataController extends Controller
{
    public function show($id)
    {
    	$objekwisata = Objekwisata::findOrFail($id);

    	$jumlah = 0;
    	if(!empty($objekwisata->gambar_satu) && !empty($objekwisata->gambar_dua) && !empty($objekwisata->gambar_tiga)) {
    		$jumlah = 3;
    	}
    	elseif(!empty($objekwisata->gambar_satu) && (!empty($objekwisata->gambar_dua))) {
    		$jumlah = 2;
    	}
    	elseif(!empty($objekwisata->gambar_satu)) {
    		$jumlah = 1;
    	}


    	// var_dump($objekwisata->nama_objekwisata);
        // $jenisobjekwisata = Jenisobjekwisata::findOrFail($id);

        // $objekwisata = Objekwisata::all();
        // $detail_objekwisata = $objekwisata->where('id_jenis',$jenisobjekwisata->id);

        // $detail = [];
        // foreach($detail_objekwisata as $test) {
        //     $detail[] = $test->nama_objekwisata;
        // }

        // print_r($jenisobjekwisata->jenis_objekwisata);
        // echo "<br>";
        // var_dump($jumlah);
        return view('users.front.id', compact('objekwisata', 'jumlah'));

    }
}
