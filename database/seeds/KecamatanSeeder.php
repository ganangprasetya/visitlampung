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
        	['nama_kecamatan'=>'Padang Cermin'],
        	['nama_kecamatan'=>'Teluk Pandan'],
        	['nama_kecamatan'=>'Gedong Tataan']
        ];

        //Masukkan data ke database
        DB::table('kecamatan')->insert($kecamatan);
    }
}
