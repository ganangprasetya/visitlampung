<?php

use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
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
        $transaksi_wisata = [
        	['id_objekwisata'=>1,'id_user'=>1, 'created_at'=>date("Y-m-d H:i:s")],
        	['id_objekwisata'=>2,'id_user'=>1, 'created_at'=>date("Y-m-d H:i:s")],
        	['id_objekwisata'=>1,'id_user'=>1, 'created_at'=>date("Y-m-d H:i:s")]
        ];

        //Masukkan data ke database
        DB::table('transaksi_wisata')->insert($transaksi_wisata);
    }
}
