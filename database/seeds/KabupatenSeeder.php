<?php

use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	// DB::table('kabupatenkota')->truncate();
        $kabupatenkota = [
        	['nama_kabupatenkota'=>'Pesawaran','pusat_pemerintahan'=>'A'],
        	['nama_kabupatenkota'=>'Lampung Selatan','pusat_pemerintahan'=>'B'],
        	['nama_kabupatenkota'=>'Lampung Barat','pusat_pemerintahan'=>'C']
        ];

        //Masukkan data ke database
        DB::table('kabupatenkota')->insert($kabupatenkota);
    }
}
