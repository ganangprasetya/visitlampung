<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenisobjekwisata extends Model
{
    protected $table = 'jenis_objekwisata';

    protected $fillable = [
    	'jenis_objekwisata'
    ];

    //relasi one to many ke detailobjekwisata
    public function objekwisata(){
    	return $this->hasMany('App/Objekwisata',"id_jenis");
    }
}
