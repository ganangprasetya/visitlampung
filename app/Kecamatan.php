<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    protected $fillable = [
    	'id_kabupatenkota',
    	'nama_kecamatan'
    ];

    //relasi one to many ke lokasi
    public function lokasi(){
    	return $this->hasMany('App\Lokasi','id_kecamatan');
    }

    public function kabupaten(){
    	return $this->belongsTo('App\Kabupaten','id_kabupatenkota');
    }
}
