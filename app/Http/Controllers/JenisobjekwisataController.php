<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Jenisobjekwisata;
use Session;

use Storage;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;

class JenisobjekwisataController extends Controller
{
    public function __construct()
    {
        //Membatasi role->kepala dinas
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
        $jenisobjekwisata = Jenisobjekwisata::all();
        $halaman = 'objekwisata';
        return view('admin.jenisobjekwisata.index', compact('halaman','jenisobjekwisata'));

        // if($request->ajax()){
        //     $jenisobjekwisata = Jenisobjekwisata::all();
        //     return Datatables::of($jenisobjekwisata)->make(true);
        // }
        // //kolom-kolom yang akan ditampilkan
        // $html = $htmlBuilder
        //     ->addColumn(['data'=>'jenis_objekwisata','name'=>'jenis_objekwisata','title'=>'Jenis Objekwisata']);
            

        // return view('admin.jenisobjekwisata.index',compact('html'));
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
        $input = $request->all();
        $this->validate($request, [
            'jenis_objekwisata' => 'required|string|max:10|unique:jenis_objekwisata,jenis_objekwisata',
            'foto' => 'required|image|max:1000|mimes:jpeg,jpg,bmp,png'
        ]);

        if($request->hasFile('foto')){
            $input['foto'] = $this->uploadFoto($request);
        }
        Jenisobjekwisata::create($input);

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

        $input = $request->all();

        $this->validate($request, [
            'jenis_objekwisata' => 'required|string|max:10|unique:jenis_objekwisata,jenis_objekwisata,'.$id,
            'foto' => 'sometimes|image|max:1000|mimes:jpeg,jpg,bmp,png'
        ]);

        if ($request->hasFile('foto')){
            //hapus foto
            $this->hapusFoto($jenisobjekwisata);

            //upload foto
            $input['foto'] = $this->uploadFoto($request);
        }

        $jenisobjekwisata->update($input);

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
        Session::flash('penting',true);
        return redirect()->route('jenisobjekwisata.index');
    }
    public function uploadFoto(Request $request){
        $foto = $request->file('foto');
        $ext = $foto->getClientOriginalExtension();

        if ($request->file('foto')->isValid()){
            $foto_name = "foto_".date('YmdHis').".$ext";
            $upload_path = 'img';
            $request->file('foto')->move($upload_path, $foto_name);

            return $foto_name;
        }
        return false;
    }

    private function hapusFoto(Jenisobjekwisata $jenisobjekwisata){
        $exist = Storage::disk('foto')->exists($jenisobjekwisata->foto);
        if(isset($jenisobjekwisata->foto) && $exist){
            $delete = Storage::disk('foto')->delete($jenisobjekwisata->foto);
            if ($delete){
                return true;
            }
            return false;
        }
    }
}
