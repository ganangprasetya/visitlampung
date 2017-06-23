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
        	['id_kabupatenkota'=>2,'nama_kecamatan'=>'Bakauheni'],
        	['id_kabupatenkota'=>14,'nama_kecamatan'=>'Teluk Betung'],
            ['id_kabupatenkota'=>15,'nama_kecamatan'=>'Metro Pusat'],
            ['id_kabupatenkota'=>13,'nama_kecamatan'=>'Banjit'],
            ['id_kabupatenkota'=>14,'nama_kecamatan'=>'Tanjung Karang Pusat'],
            ['id_kabupatenkota'=>2,'nama_kecamatan'=>'Natar'],
            ['id_kabupatenkota'=>4,'nama_kecamatan'=>'Way Jepara'],
            ['id_kabupatenkota'=>7,'nama_kecamatan'=>'Punduh Pidada'],
            ['id_kabupatenkota'=>7,'nama_kecamatan'=>'Padang Cermin'],
        	['id_kabupatenkota'=>9,'nama_kecamatan'=>'Pringsewu']
        ];

        //Masukkan data ke database
        DB::table('kecamatan')->insert($kecamatan);
    }
}
