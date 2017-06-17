<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kecamatan;

use Session;

class KecamatanController extends Controller
{
    public function __construct()
    {
        //Membatasi role->operator
        $this->middleware('role:admin',['except'=>[
            'index'
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $halaman = 'objekwisata';
        return view('admin.kecamatan.index', compact('halaman','kecamatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kecamatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kabupatenkota' => 'required',
            'nama_kecamatan'=> 'required|string|max:30|unique:kecamatan,nama_kecamatan'
        ]);
        Kecamatan::create($request->all());
        Session::flash('flash_message','Data Kecamatan berhasil disimpan.');
        return redirect()->route('kecamatan.index');
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
        $kecamatan = Kecamatan::findOrFail($id);
        return view('admin.kecamatan.edit', compact('kecamatan'));
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
        $kecamatan = Kecamatan::findOrFail($id);
        $this->validate($request, [
            'id_kabupatenkota' => 'required',
            'nama_kecamatan'=> 'required|string|max:30|unique:kecamatan,nama_kecamatan,'.$id
        ]);
        $kecamatan->update($request->all());
        Session::flash('flash_message','Data Kecamatan berhasil diupdate.');
        return redirect()->route('kecamatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();
        Session::flash('flash_message','Data Kecamatan berhasil dihapus.');
        return redirect()->route('kecamatan.index');
    }
}
