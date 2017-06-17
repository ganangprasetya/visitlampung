<?php

use Illuminate\Database\Seeder;
use App\Biodata;

class BiodataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $paulus = new Biodata();
    	$paulus->id = 1;
        $paulus->user_id = 1;
    	$paulus->nama = 'Paulus';
    	$paulus->tempat_lahir = 'Tarsus';
    	$paulus->tanggal_lahir = '1998-08-08';
    	$paulus->jenis_kelamin = 'L';
    	$paulus->alamat = 'Jln. Tarsus, Indonesia';
    	$paulus->no_hp = '082124020675';
    	$paulus->lat_reg = -5.554455544;
    	$paulus->long_reg = 105.554455544;
    	$paulus->lat_now = -5.554455544;
    	$paulus->long_now = 105.554455544;
    	$paulus->save();
    }
}
