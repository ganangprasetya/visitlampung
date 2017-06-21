<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaksi;
use App\Objekwisata;
use Session;

use App\Role;
use PDF;
use Carbon\Carbon;

class TransaksiController extends Controller
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
        $transaksi = Transaksi::all();
        $users = Role::where('name','user')->first()->users;
        $halaman = 'transaksi';
        return view('admin.Transaksi.index', compact('halaman','transaksi','users'));
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

    public function pdf()
    {   
        $transaksi = Transaksi::all();
        $objekwisata = Objekwisata::all();
        
        $tanggal = Carbon::now()->format('d/m/Y');
        $bulan = Carbon::now()->formatLocalized('%B');
        $hari = Carbon::now()->format('d');
        $bulan1 = Carbon::now()->format('m');
        $tahun = Carbon::now()->format('Y');

        $pdf = PDF::loadView('pdf',compact('transaksi', 'objekwisata','tanggal','bulan','hari','bulan1','tahun'));
        return $pdf->stream('transaksi-'.date('YmdHis').'.pdf');
    }
    

}
