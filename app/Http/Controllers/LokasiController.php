<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lokasi;
use App\Kecamatan;
use App\Kabupaten;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokasi = Lokasi::all();
        $halaman = 'objekwisata';
        return view('admin.lokasi.index', compact('halaman','lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('it works');
        // $lokasi = $request->all();
        // return $lokasi;
        Lokasi::create($request->all());
        return redirect()->route('lokasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $kecamatan_list = Kecamatan::where('id_kabupatenkota',$lokasi->kecamatan->id_kabupatenkota)->get();
        // $kecamatan= [];
        // foreach($kecamatan_list as $list) {
        //     $kecamatan[] = $list->nama_kecamatan;
        // }
        $kecamatan = $kecamatan_list->pluck('nama_kecamatan','id');
        // var_dump($kecamatan);
        return view('admin.lokasi.edit', compact('lokasi','kecamatan'));
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
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->update($request->all());
        return redirect()->route('lokasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();
        return redirect()->route('lokasi.index');
    }

    public function ajax(Request $request)
    {
        $kabupaten_id = $request->get('id_kabupatenkota');
        $kecamatan = Kecamatan::where('id_kabupatenkota', '=', $kabupaten_id)->get();

        return json_encode($kecamatan);
    }
}
