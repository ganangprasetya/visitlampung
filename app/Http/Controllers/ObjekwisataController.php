<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Objekwisata;

use Storage;

use Session;


class ObjekwisataController extends Controller
{
    public function __construct()
    {
        //Membatasi role->operator
        $this->middleware('role:admin',['except'=>[
            'index',
            'show'
        ]]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objekwisata = Objekwisata::all();
        $halaman = 'objekwisata';
        $jumlah_objekwisata = $objekwisata->count();
        return view('admin.objekwisata.index', compact('halaman','objekwisata','jumlah_objekwisata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.objekwisata.create');
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
                'nama_objekwisata' => 'required|string|max:30|unique:detail_objek_wisata,nama_objekwisata',
                'id_jenis' => 'required',
                'id_lokasi' => 'required',
                'lat' => 'required',
                'long' => 'required',
                'info' => 'required',
                'gambar_satu' => 'required|image|max:500|mimes:jpeg,jpg,bmp,png',
                'gambar_dua' => 'required|image|max:500|mimes:jpeg,jpg,bmp,png',
                'gambar_tiga' => 'required|image|max:500|mimes:jpeg,jpg,bmp,png',
            ]);
            if($request->hasFile('gambar_satu')){
                $gambar_satu = $request->file('gambar_satu');
                $ext_satu = $gambar_satu->getClientOriginalExtension();

                if ($request->file('gambar_satu')->isValid()){
                    $gambarsatu_name = "pictone_".date('YmdHis').".$ext_satu";
                    $upload_path = 'img';
                    $request->file('gambar_satu')->move($upload_path, $gambarsatu_name);
                    $input['gambar_satu'] = $gambarsatu_name;
                }
            }
            if($request->hasFile('gambar_dua')){
                $gambar_dua = $request->file('gambar_dua');
                $ext_dua = $gambar_dua->getClientOriginalExtension();

                if ($request->file('gambar_dua')->isValid()){
                    $gambardua_name = "picttwo_".date('YmdHis').".$ext_dua";
                    $upload_path = 'img';
                    $request->file('gambar_dua')->move($upload_path, $gambardua_name);
                    $input['gambar_dua'] = $gambardua_name;
                }
            }
            if($request->hasFile('gambar_tiga')){
                $gambar_tiga = $request->file('gambar_tiga');
                $ext_tiga = $gambar_tiga->getClientOriginalExtension();

                if ($request->file('gambar_tiga')->isValid()){
                    $gambartiga_name = "pictthree_".date('YmdHis').".$ext_tiga";
                    $upload_path = 'img';
                    $request->file('gambar_tiga')->move($upload_path, $gambartiga_name);
                    $input['gambar_tiga'] = $gambartiga_name;
                }
            }

        Objekwisata::create($input);
        // dd($input['gambar_satu']);
        Session::flash('flash_message','Detail Objek Wisata berhasil disimpan.');
        return redirect()->route('objekwisata.index');
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
        $objekwisata = Objekwisata::findOrFail($id);
        return view('admin.objekwisata.show', compact('objekwisata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objekwisata = Objekwisata::findOrFail($id);
        return view('admin.objekwisata.edit', compact('objekwisata'));
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
        $objekwisata = Objekwisata::findOrFail($id);
        $input = $request->all();
            $this->validate($request, [
                'nama_objekwisata' => 'required|string|max:30|unique:detail_objek_wisata,nama_objekwisata,'.$id,
                'id_jenis' => 'required',
                'id_lokasi' => 'required',
                'lat' => 'required',
                'long' => 'required',
                'info' => 'required',
                'gambar_satu' => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png',
                'gambar_dua' => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png',
                'gambar_tiga' => 'sometimes|image|max:500|mimes:jpeg,jpg,bmp,png',
            ]);
            if($request->hasFile('gambar_satu')){
                $exist_satu = Storage::disk("gambar_satu")->exists($objekwisata->gambar_satu);
                if(isset($objekwisata->gambar_satu) && $exist_satu){
                    $delete = Storage::disk('gambar_satu')->delete($objekwisata->gambar_satu);
                }
                $gambar_satu = $request->file('gambar_satu');
                $ext_satu = $gambar_satu->getClientOriginalExtension();
                if ($request->file('gambar_satu')->isValid()){
                    $gambarsatu_name = "pictone_".date('YmdHis').".$ext_satu";
                    $upload_path = 'img';
                    $request->file('gambar_satu')->move($upload_path, $gambarsatu_name);
                    $input['gambar_satu'] = $gambarsatu_name;
                }
            }

            if($request->hasFile('gambar_dua')){
                $exist_dua = Storage::disk("gambar_dua")->exists($objekwisata->gambar_dua);
                if(isset($objekwisata->gambar_dua) && $exist_dua){
                    $delete = Storage::disk('gambar_dua')->delete($objekwisata->gambar_dua);
                }
                $gambar_dua = $request->file('gambar_dua');
                $ext_dua = $gambar_dua->getClientOriginalExtension();
                if ($request->file('gambar_dua')->isValid()){
                    $gambardua_name = "picttwo_".date('YmdHis').".$ext_dua";
                    $upload_path = 'img';
                    $request->file('gambar_dua')->move($upload_path, $gambardua_name);
                    $input['gambar_dua'] = $gambardua_name;
                }
            }

            if($request->hasFile('gambar_tiga')){
                $exist_tiga = Storage::disk("gambar_tiga")->exists($objekwisata->gambar_tiga);
                if(isset($objekwisata->gambar_tiga) && $exist_tiga){
                    $delete = Storage::disk('gambar_tiga')->delete($objekwisata->gambar_tiga);
                }
                $gambar_tiga = $request->file('gambar_tiga');
                $ext_tiga = $gambar_tiga->getClientOriginalExtension();
                if ($request->file('gambar_tiga')->isValid()){
                    $gambartiga_name = "pictthree_".date('YmdHis').".$ext_tiga";
                    $upload_path = 'img';
                    $request->file('gambar_tiga')->move($upload_path, $gambartiga_name);
                    $input['gambar_tiga'] = $gambartiga_name;
                }
            }
        $objekwisata->update($input);

        Session::flash('flash_message','Detail Objek Wisata berhasil diupdate.');

        return redirect()->route('objekwisata.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objekwisata = Objekwisata::findOrFail($id);
        $objekwisata->delete();
        Session::flash('flash_message','Detail Objek Wisata berhasil dihapus.');
        return redirect()->route('objekwisata.index');
    }
}
