<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi_wisata';

    protected $fillable = [
    	'id_objekwisata',
    	'id_user'
    ];
    //one to one
    public function objekwisata(){
    	return $this->belongsTo('App/Objekwisata',"id_objekwisata");
    }

    //one to one
    public function user(){
    	return $this->belongsTo('App/User',"id_user");
    }
}
