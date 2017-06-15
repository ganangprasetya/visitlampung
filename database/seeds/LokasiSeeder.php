<?php

use Illuminate\Database\Seeder;

class LokasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//Lokasi Seeder
        // DB::table('lokasi')->truncate();
        $lokasi = [
        	['id_kecamatan'=>2,'desa_kelurahan'=>'Hanura'],
        	['id_kecamatan'=>1,'desa_kelurahan'=>'Hurun'],
        	['id_kecamatan'=>1,'desa_kelurahan'=>'Magan']
        ];

        //Masukkan data ke database
        DB::table('lokasi')->insert($lokasi);
    }
}
