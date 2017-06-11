<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetaillokasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detaillokasi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kabupatenkota')->unsigned()->index();
            $table->integer('id_kecamatan')->unsigned()->index();
            $table->string('nama_lokasi', 30);
            $table->timestamps();
        });
        Schema::table('detail_objek_wisata', function (Blueprint $table) {
            $table->foreign('id_lokasi')
                  ->references('id')
                  ->on('detaillokasi')
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
        Schema::drop('detaillokasi');
    }
}
