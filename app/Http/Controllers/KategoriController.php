<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jenisobjekwisata;

use App\Objekwisata;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Jenisobjekwisata::all();
        return view('users.front.index', compact('kategori'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jenisobjekwisata = Jenisobjekwisata::findOrFail($id);

        $objekwisata = Objekwisata::all();
        $detail_objekwisata = $objekwisata->where('id_jenis',$jenisobjekwisata->id);

        // $detail = [];
        // foreach($detail_objekwisata as $test) {
        //     $detail[] = $test->nama_objekwisata;
        // }

        // print_r($jenisobjekwisata->jenis_objekwisata);
        // echo "<br>";
        // var_dump($detail);
        return view('users.front.wisata', compact('jenisobjekwisata','detail_objekwisata'));

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

    public function searchWisatas(Request $request){
        $lat = $request->lat;
        $lng = $request->lng;
        $id = $request->id;
        $wisatas = Objekwisata::whereBetween('lat',[$lat-0.1,$lat+0.1])->whereBetween('lng',[$lng-0.1,$lng+0.1])->get();
        return $wisatas;
    }

}
