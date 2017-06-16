<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jenisobjekwisata;

use Session;

class JenisobjekwisataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenisobjekwisata = Jenisobjekwisata::all();
        $halaman = 'objekwisata';
        return view('admin.jenisobjekwisata.index', compact('halaman','jenisobjekwisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.jenisobjekwisata.create');
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
            'jenis_objekwisata' => 'required|string|max:10|unique:jenis_objekwisata,jenis_objekwisata'
        ]);
        Jenisobjekwisata::create($request->all());

        Session::flash('flash_message','Jenis Objekwisata berhasil disimpan.');

        return redirect()->route('jenisobjekwisata.index');
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
        $jenisobjekwisata = Jenisobjekwisata::findOrFail($id);
        return view('admin.jenisobjekwisata.edit', compact('jenisobjekwisata'));
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
        $jenisobjekwisata = jenisobjekwisata::findOrFail($id);
        $this->validate($request, [
            'jenis_objekwisata' => 'required|string|max:10|unique:jenis_objekwisata,jenis_objekwisata,'.$id
        ]);
        $jenisobjekwisata->update($request->all());

        Session::flash('flash_message','Jenis Objekwisata berhasil diupdate.');

        return redirect()->route('jenisobjekwisata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jenisobjekwisata = Jenisobjekwisata::findOrFail($id);
        $jenisobjekwisata->delete();
        Session::flash('flash_message','Jenis Objekwisata berhasil dihapus.');
        return redirect()->route('jenisobjekwisata.index');
    }
}
