<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKecamatan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kecamatan', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('id_kabupatenkota')->unsigned()->index();
            $table->string('nama_kecamatan');
            $table->timestamps();
        });
        Schema::table('lokasi', function (Blueprint $table) {
            $table->foreign('id_kecamatan')
                  ->references('id')
                  ->on('kecamatan')
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
        Schema::table('lokasi', function (Blueprint $table) {
            $table->dropForeign('lokasi_id_kecamatan_foreign');
        });
        Schema::drop('kecamatan');
    }
}
