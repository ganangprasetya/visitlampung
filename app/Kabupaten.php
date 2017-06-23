<?php

namespace App;
use Session;

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

    //Model Event
    public static function boot()
    {
        parent::boot();
        //deleting -> jika masih ada Kecamatan dalam Kabupaten maka tidak dapat dihapus
        self::deleting(function($kabupaten){
            //mengecek apakah kecamatan masih ada di kabupaten ini
            if($kabupaten->kecamatan->count() > 0){
                //menyiapkan pesan error
                Session::flash('flash_error','Kabupaten tidak dapat dihapus karena masih memiliki Kecamatan');
                Session::flash('penting',true);

                return false;
            }
        });
    }
}
