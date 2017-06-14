<?php

use Illuminate\Database\Seeder;

class JenisobjekwisataSeeder extends Seeder
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
        $jenis_objekwisata = [
        	['jenis_objekwisata'=>'Alam'],
        	['jenis_objekwisata'=>'Keluarga'],
        	['jenis_objekwisata'=>'Belanja'],
        	['jenis_objekwisata'=>'Religi'],
        	['jenis_objekwisata'=>'Kuliner'],
        	['jenis_objekwisata'=>'Sejarah']
        ];

        //Masukkan data ke database
        DB::table('jenis_objekwisata')->insert($jenis_objekwisata);
    }
}
