<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Objekwisata;
use App\Biodata;
use Illuminate\Support\Facades\Auth;
use Excel;

class BackupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.backup.index');
    }
    public function export()
    {
        $objekwisata = Objekwisata::all();
        //membuat file excel Objekwisata
        $excel = Excel::create('Data Objekwisata-'.date('YmdHis'), function($excel) use($objekwisata){
            //Set Property
            $excel->setTitle('Data Backup Objekwisata')
                  ->setCreator(Auth::user()->name);
            //memberi nama Sheet
            $excel->sheet('Data Backup Objekwisata', function($sheet) use($objekwisata){
                $row = 1;
                //style sheeet excel
                $sheet->freezeFirstRow();
                //memakai border untuk header
                $sheet->cells('A1:AT1', function($cells) {
                    $cells->setFont(array(
                        'family'     => 'Calibri',
                        'size'       => '16',
                        'bold'       =>  true
                    ));
                    $cells->setBorder('A1:AT1', 'thin');
                });
                //header
                $sheet->row($row,[
                    'No.',
                    'Nama Objekwisata',
                    'Jenis Objekwisata',
                    'Lokasi',
                    'Lat',
                    'Long',
                    'Info',
                ]);
                //data objekwisata
                foreach($objekwisata as $objek){
                    $sheet->row(++$row, [
                        $objek->id,
                        $objek->nama_objekwisata,
                        $objek->jenisobjekwisata->jenis_objekwisata,
                        $objek->lokasi->desa_kelurahan,
                        $objek->lat,
                        $objek->lng,
                        $objek->info
                    ]);
                }
            });
        })->export('xls');
        // $biodata = Biodata::all();
        // //membuat file excel dengan nama-> Data BIODATA
        // $excel = Excel::create('Data Biodata-'.date('YmdHis'), function($excel) use($biodata){
        //     //Set Property
        //     $excel->setTitle('Data Backup Biodata')
        //           ->setCreator(Auth::user()->name);
        //     //memberi nama Sheet
        //     $excel->sheet('Data Backup Biodata', function($sheet) use($biodata){
        //         $row = 1;
        //         //style sheeet excel
        //         $sheet->freezeFirstRow();
        //         //memakai border untuk header
        //         $sheet->cells('A1:AT1', function($cells) {
        //             $cells->setFont(array(
        //                 'family'     => 'Calibri',
        //                 'size'       => '16',
        //                 'bold'       =>  true
        //             ));
        //             $cells->setBorder('A1:AT1', 'thin');
        //         });
        //         //header
        //         $sheet->row($row,[
        //             'No.',
        //             'Nama',
        //             'Tempat Lahir',
        //             'Tanggal Lahir',
        //             'Jenis Kelamin',
        //             'Alamat',
        //             'No HP',
        //             'Lat Registrasi',
        //             'Lng Registrasi',
        //         ]);
        //         //data biodata
        //         foreach($biodata as $objek){
        //             $sheet->row(++$row, [
        //                 $objek->id,
        //                 $objek->nama,
        //                 $objek->tempat_lahir,
        //                 $objek->tanggal_lahir->formatLocalized('%d %B %Y'),
        //                 $objek->jenis_kelamin,
        //                 $objek->alamat,
        //                 $objek->no_hp,
        //                 $objek->lat,
        //                 $objek->lng
        //             ]);
        //         }
        //     });
        // })->export('xls');
    }
}
