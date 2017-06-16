<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Kabupaten;

use Storage;

use Session;

class KabupatenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kabupaten = Kabupaten::all();
        $halaman = 'objekwisata';
        return view('admin.kabupaten.index', compact('halaman','kabupaten'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kabupaten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Kabupaten::create($request->all());
        $input = $request->all();

        $this->validate($request, [
            'nama_kabupatenkota' => 'required|string|max:30|unique:kabupatenkota,nama_kabupatenkota',
            'pusat_pemerintahan'=> 'required|string|max:30|unique:kabupatenkota,pusat_pemerintahan',
            'peta_lokasi' => 'required|image|max:500|mimes:jpeg,jpg,bmp,png'
        ]);

        if($request->hasFile('peta_lokasi')){
            $input['peta_lokasi'] = $this->uploadFoto($request);
        }
        $kabupaten = Kabupaten::create($input);

        //session
        Session::flash('flash_message','Data Kabupaten berhasil disimpan.');

        return redirect()->route('kabupaten.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $halaman = 'objekwisata';
        $kabupaten = Kabupaten::findOrFail($id);
        return view('admin.kabupaten.show', compact('kabupaten'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kabupaten = Kabupaten::findOrFail($id);
        return view('admin.kabupaten.edit', compact('kabupaten'));
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
        $kabupaten = Kabupaten::findOrFail($id);
        // dd('it works');
        $input = $request->all();

        $this->validate($request, [
            'nama_kabupatenkota' => 'required|string|max:30|unique:kabupatenkota,nama_kabupatenkota,'.$id,
            'pusat_pemerintahan'=> 'required|string|max:30|unique:kabupatenkota,pusat_pemerintahan,'.$id,
            'peta_lokasi' => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png'
        ]);

        //hapus foto lama
        if ($request->hasFile('peta_lokasi')){
            //hapus foto
            $this->hapusFoto($kabupaten);

            //upload foto
            $input['peta_lokasi'] = $this->uploadFoto($request);
        }
        $kabupaten->update($input);

        //session
        Session::flash('flash_message','Data Kabupaten berhasil diupdate.');

        return redirect()->route('kabupaten.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kabupaten = Kabupaten::findOrFail($id);
        $this->hapusFoto($kabupaten);
        $kabupaten->delete();

        Session::flash('flash_message','Data Kabupaten berhasil dihapus.');
        Session::flash('penting',true);
        
        return redirect()->route('kabupaten.index');
    }

    public function uploadFoto(Request $request){
        $peta_lokasi = $request->file('peta_lokasi');
        $ext = $peta_lokasi->getClientOriginalExtension();

        if ($request->file('peta_lokasi')->isValid()){
            $peta_lokasi_name = "peta_".date('YmdHis').".$ext";
            $upload_path = 'img';
            $request->file('peta_lokasi')->move($upload_path, $peta_lokasi_name);

            return $peta_lokasi_name;
        }
        return false;
    }

    private function hapusFoto(Kabupaten $kabupaten){
        $exist = Storage::disk('peta_lokasi')->exists($kabupaten->peta_lokasi);
        if(isset($kabupaten->peta_lokasi) && $exist){
            $delete = Storage::disk('peta_lokasi')->delete($kabupaten->peta_lokasi);
            if ($delete){
                return true;
            }
            return false;
        }
    }
}
