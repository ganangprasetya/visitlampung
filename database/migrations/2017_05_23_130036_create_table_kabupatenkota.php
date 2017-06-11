<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKabupatenkota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kabupatenkota', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_kabupatenkota', 30);
            $table->string('pusat_pemerintahan', 30);
            $table->string('peta_lokasi')->nullable();
            $table->timestamps();
        });
        // Schema::table('lokasi', function (Blueprint $table) {
        //     $table->foreign('id_kabupatenkota')
        //           ->references('id')
        //           ->on('kabupatenkota')
        //           ->onDelete('cascade')
        //           ->onUpdate('cascade');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::table('lokasi', function (Blueprint $table) {
        //     $table->dropForeign('lokasi_id_kabupatenkota_foreign');
        // });
        Schema::drop('kabupatenkota');
    }
}
