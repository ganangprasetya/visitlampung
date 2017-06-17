<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata';
    //mass assignment
    protected $fillable = [
        'user_id',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'foto',
        'lat_reg',
        'long_reg',
        'lat_now',
        'long_now'
    ];

    public function user(){
    	return $this->belongsTo('App/User',"id_user");
    }
}
