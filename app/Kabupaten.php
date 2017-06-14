<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten extends Model
{
    protected $table = 'kabupatenkota';

    protected $fillable = [
    	'nama_kabupatenkota',
    	'pusat_pemerintahan',
    	'peta_lokasi'
    ];

    //relasi one to many ke lokasi
    public function lokasi(){
    	return $this->hasMany('App\Lokasi','id_kabupatenkota');
    }
}
