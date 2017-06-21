<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Biodata;

use App\User;

use Storage;

use Session;

class BiodataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $biodata = Biodata::all();
        return view('users.front.profile', compact('biodata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $biodata = $request->user()->biodata()->get();
        //mengambil data status -> Array
        $status = $biodata->toArray();
        if(!empty($status)){
            //meredirect jika sudah memiliki Biodata
            // Session::flash('flash_error','Maaf, Anda sudah memiliki Biodata');
            // Session::flash('penting',true);
            return redirect()->route('biodata.index');
        }
        return view('users.biodata.createbiodata');
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
            'nama' => 'required|string|max:30',
            'tempat_lahir'=> 'required|string|max:30',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'alamat'=> 'required|string|max:30',
            'no_hp'=> 'required|numeric|digits_between:10,15',
            'foto' => 'required|image|max:700|mimes:jpeg,jpg,bmp,png'
        ]);


        if($request->hasFile('foto')){
            $input['foto'] = $this->uploadFoto($request);
        }

        // dd($input);
        Biodata::create($input);
        return redirect()->route('biodata.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $biodata = User::findOrFail($id);
        return view('users.front.profile', compact('biodata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $biodata = Biodata::findOrFail($id);

        // dd($biodata);
        return view('users.biodata.editbiodata', compact('biodata'));
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
        $biodata = Biodata::findOrFail($id);
        // dd('it works');
        $input = $request->all();

        $this->validate($request, [
            'nama' => 'required|string|max:30',
            'tempat_lahir'=> 'required|string|max:30',
            'tanggal_lahir'=> 'required',
            'jenis_kelamin'=> 'required',
            'alamat'=> 'required|string|max:30',
            'no_hp'=> 'required|numeric|digits_between:10,15',
            'foto' => 'sometimes|image|max:700|mimes:jpeg,jpg,bmp,png'
        ]);

        if ($request->hasFile('foto')){
            //hapus foto
            $this->hapusFoto($biodata);

            //upload foto
            $input['foto'] = $this->uploadFoto($request);
        }

        $biodata->update($input);

        //session
        // Session::flash('flash_message','Biodata anda berhasil diupdate.');

        return redirect()->route('biodata.index');
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
    public function uploadFoto(Request $request){
        $foto = $request->file('foto');
        $ext = $foto->getClientOriginalExtension();

        if ($request->file('foto')->isValid()){
            $foto_name = "profile_".date('YmdHis').".$ext";
            $upload_path = 'img';
            $request->file('foto')->move($upload_path, $foto_name);

            return $foto_name;
        }
        return false;
    }

    private function hapusFoto(Biodata $biodata){
        $exist = Storage::disk('foto')->exists($biodata->foto);
        if(isset($biodata->foto) && $exist){
            $delete = Storage::disk('foto')->delete($biodata->foto);
            if ($delete){
                return true;
            }
            return false;
        }
    }
}
