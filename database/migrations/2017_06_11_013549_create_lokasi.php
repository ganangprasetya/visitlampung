<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLokasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('lokasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kabupatenkota')->unsigned();
            $table->integer('id_kecamatan')->unsigned();
            $table->string('desa_kelurahan', 30);
            $table->timestamps();
        });
        Schema::table('detail_objek_wisata', function (Blueprint $table) {
            $table->foreign('id_lokasi')
                  ->references('id')
                  ->on('lokasi')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_objek_wisata', function (Blueprint $table) {
            $table->dropForeign('detail_objek_wisata_id_lokasi_foreign');
        });
        Schema::drop('lokasi');
    }
}
