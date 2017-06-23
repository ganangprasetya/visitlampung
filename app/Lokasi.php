<?php

namespace App;
use Session;
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
        return $this->hasMany('App\Objekwisata','id_lokasi');
    }

    public static function boot()
    {
        parent::boot();
        //deleting -> jika masih ada objekwisata dalam lokasi maka tidak dapat dihapus
        self::deleting(function($lokasi){
            //mengecek apakah objekwisata masih ada di lokasi ini
            if($lokasi->objekwisata->count() > 0){
                //menyiapkan pesan error
                Session::flash('flash_error','Lokasi tidak dapat dihapus karena masih memiliki Objekwisata');
                Session::flash('penting',true);

                return false;
            }
        });
    }

}
