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
        	['id_kecamatan'=>8,'desa_kelurahan'=>'Kedondong'],
        	['id_kecamatan'=>9,'desa_kelurahan'=>'Hurun'],
            ['id_kecamatan'=>7,'desa_kelurahan'=>'Rajabasa Lama Desa'],
            ['id_kecamatan'=>5,'desa_kelurahan'=>'Durian Payung'],
            ['id_kecamatan'=>6,'desa_kelurahan'=>'Pemanggilan'],
            ['id_kecamatan'=>9,'desa_kelurahan'=>'Sukajaya Lempasing'],
            ['id_kecamatan'=>4,'desa_kelurahan'=>'Juku Batu'],
            ['id_kecamatan'=>1,'desa_kelurahan'=>'Lintas Timur'],
            ['id_kecamatan'=>9,'desa_kelurahan'=>'Way Ratay'],
            ['id_kecamatan'=>5,'desa_kelurahan'=>'Gotong Royong'],
            ['id_kecamatan'=>5,'desa_kelurahan'=>'Enggal'],
            ['id_kecamatan'=>10,'desa_kelurahan'=>'KH Ghalib'],
        	['id_kecamatan'=>9,'desa_kelurahan'=>'Hurun']
        ];

        //Masukkan data ke database
        DB::table('lokasi')->insert($lokasi);
    }
}
