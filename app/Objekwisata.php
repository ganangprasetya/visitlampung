<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objekwisata extends Model
{
    protected $table = 'detail_objek_wisata';

    protected $fillable = [
    	'nama_objekwisata',
    	'id_jenis',
    	'id_lokasi',
    	'lat',
    	'long',
    	'info',
    	'gambar'
    ];

    //relasi one to many dari jenis
    public function jenisobjekwisata(){
    	return $this->belongsTo('App\Jenisobjekwisata','id_jenis');
    }

    //relasi one to many dari lokasi
    public function lokasi(){
    	return $this->belongsTo('App\Lokasi','id_lokasi');
    }

    //relasi one to one ke transaksi
    public function transaksi(){
        return $this->hasOne('App/Transaksi',"id_objekwisata");
    }
}
