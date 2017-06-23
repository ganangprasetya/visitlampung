<?php

namespace App;
use Session;

use Illuminate\Database\Eloquent\Model;

class Jenisobjekwisata extends Model
{
    protected $table = 'jenis_objekwisata';

    protected $fillable = [
    	'jenis_objekwisata',
    	'foto'
    ];

    //relasi one to many ke detailobjekwisata
    public function objekwisata(){
    	return $this->hasMany('App\Objekwisata',"id_jenis");
    }

    //Model Event
    public static function boot()
    {
    	parent::boot();
        //deleting -> jika masih ada Objekwista dalam Jenisobjekwisata maka tidak dapat dihapus
    	self::deleting(function($jenisobjekwisata){
    		//mengecek apakah objekwisata masih ada di jenisobjekwisata ini
    		if($jenisobjekwisata->objekwisata->count() > 0){
    			//menyiapkan pesan error
    			Session::flash('flash_error','Jenis Objekwisata tidak dapat dihapus karena masih memiliki Objekwisata');
    			Session::flash('penting',true);

    			return false;
    		}
    	});
    }
}
