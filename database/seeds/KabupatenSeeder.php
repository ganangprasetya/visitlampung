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
        	['nama_kabupatenkota'=>'Lampung Barat','pusat_pemerintahan'=>'Liwa'],
        	['nama_kabupatenkota'=>'Lampung Selatan','pusat_pemerintahan'=>'Kalianda'],
            ['nama_kabupatenkota'=>'Lampung Tengah','pusat_pemerintahan'=>'Gunung Sugih'],
            ['nama_kabupatenkota'=>'Lampung Timur','pusat_pemerintahan'=>'Sukadana'],
            ['nama_kabupatenkota'=>'Lampung Utara','pusat_pemerintahan'=>'Kotabumi'],
            ['nama_kabupatenkota'=>'Mesuji','pusat_pemerintahan'=>'Mesuji'],
            ['nama_kabupatenkota'=>'Pesawaran','pusat_pemerintahan'=>'Gedong Tataan'],
            ['nama_kabupatenkota'=>'Pesisir Barat','pusat_pemerintahan'=>'Krui'],
            ['nama_kabupatenkota'=>'Pringsewu','pusat_pemerintahan'=>'Pringsewu'],
            ['nama_kabupatenkota'=>'Tanggamus','pusat_pemerintahan'=>'Kota Agung'],
            ['nama_kabupatenkota'=>'Tulang Bawang','pusat_pemerintahan'=>'Menggala'],
            ['nama_kabupatenkota'=>'Tulang Bawang Barat','pusat_pemerintahan'=>'Tulang Bawang Tengah'],
            ['nama_kabupatenkota'=>'Way Kanan','pusat_pemerintahan'=>'Blambangan Umpu'],
            ['nama_kabupatenkota'=>'Bandar Lampung','pusat_pemerintahan'=>'Bandar Lampung'],
            ['nama_kabupatenkota'=>'Metro','pusat_pemerintahan'=>'Metro']
        ];

        //Masukkan data ke database
        DB::table('kabupatenkota')->insert($kabupatenkota);
    }
}
