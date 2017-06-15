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

    //relasi one to many ke kecamatan
    public function kecamatan()
    {
    	return $this->hasMany('App\Kecamatan','id_kabupatenkota');
    }
}
