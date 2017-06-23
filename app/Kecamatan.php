<?php

namespace App;
use Session;

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

    //Model Event
    public static function boot()
    {
        parent::boot();
        //deleting -> jika masih ada lokasi dalam kecamatan maka tidak dapat dihapus
        self::deleting(function($kecamatan){
            //mengecek apakah lokasi masih ada di kecamatan ini
            if($kecamatan->lokasi->count() > 0){
                //menyiapkan pesan error
                Session::flash('flash_error','Kecamatan tidak dapat dihapus karena masih memiliki Lokasi');
                Session::flash('penting',true);

                return false;
            }
        });
    }
}
