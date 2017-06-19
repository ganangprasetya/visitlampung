<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDetailObjekWisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_objek_wisata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_objekwisata', 50);
            $table->integer('id_jenis')->unsigned();
            $table->integer('id_lokasi')->unsigned();
            $table->double('lat', 10,5);
            $table->double('lng', 10,5);
            $table->text('info');
            $table->string('gambar_satu')->nullable();
            $table->string('gambar_dua')->nullable();
            $table->string('gambar_tiga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('detail_objek_wisata');
    }
}
