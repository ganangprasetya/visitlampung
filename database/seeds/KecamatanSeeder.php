<?php

use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('kecamatan')->truncate();
        $kecamatan = [
        	['id_kabupatenkota'=>1,'nama_kecamatan'=>'Padang Cermin'],
        	['id_kabupatenkota'=>2,'nama_kecamatan'=>'Teluk Pandan'],
        	['id_kabupatenkota'=>3,'nama_kecamatan'=>'Gedong Tataan']
        ];

        //Masukkan data ke database
        DB::table('kecamatan')->insert($kecamatan);
    }
}
