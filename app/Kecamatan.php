<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';

    protected $fillable = [
    	'nama_kecamatan'
    ];

    //relasi one to many ke lokasi
    public function lokasi(){
    	return $this->hasMany('App\Lokasi','id_kecamatan');
    }
}
