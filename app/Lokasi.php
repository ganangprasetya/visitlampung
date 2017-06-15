<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    protected $table = 'lokasi';

    protected $fillable = [
    	'id_kecamatan',
    	'desa_kelurahan'
    ];

    //relasi one to many dari kecamatan
    public function kecamatan(){
    	return $this->belongsTo('App\Kecamatan','id_kecamatan');
    }

    //relasi one to many dari objek wisata
    public function objekwisata(){
        return $this->belongsTo('App\Objekwisata','id_lokasi');
    }

}
