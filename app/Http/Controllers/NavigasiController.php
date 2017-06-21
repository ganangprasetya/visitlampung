<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Objekwisata;
use App\Transaksi;
use Illuminate\Support\Facades\Auth;

class NavigasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $input['id_user'] = Auth::user()->id;
        Transaksi::create($input);

        return redirect()->route('kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $navigasi = Objekwisata::findOrFail($id);
        return view('users/front/navigasi', compact('navigasi'));
        // $objekwisata = Objekwisata::findOrFail($id);

        // // var_dump($objekwisata->nama_objekwisata);
        // // $jenisobjekwisata = Jenisobjekwisata::findOrFail($id);

        // // $objekwisata = Objekwisata::all();
        // // $detail_objekwisata = $objekwisata->where('id_jenis',$jenisobjekwisata->id);

        // // $detail = [];
        // // foreach($detail_objekwisata as $test) {
        // //     $detail[] = $test->nama_objekwisata;
        // // }

        // // print_r($jenisobjekwisata->jenis_objekwisata);
        // // echo "<br>";
        // // var_dump($jumlah);
        // return view('users.front.id', compact('objekwisata', 'jumlah'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
