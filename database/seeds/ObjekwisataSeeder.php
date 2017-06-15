<?php

use Illuminate\Database\Seeder;

class ObjekwisataSeeder extends Seeder
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
        $detail_objek_wisata = [
        	['nama_objekwisata'=>'Pantai Mutun', 'id_jenis'=>1,'id_lokasi'=>1, 'lat'=>'-3.99887', 'long'=>'105.8899900','info'=>'Pantai Mutun adalah sesuatu pantai lautan'],
        	['nama_objekwisata'=>'Pantai Klara', 'id_jenis'=>1,'id_lokasi'=>2, 'lat'=>'-3.97787', 'long'=>'105.885500','info'=>'Pantai Klara adalah sesuatu pantai lautan']
        ];

        //Masukkan data ke database
        DB::table('detail_objek_wisata')->insert($detail_objek_wisata);
    }
}
