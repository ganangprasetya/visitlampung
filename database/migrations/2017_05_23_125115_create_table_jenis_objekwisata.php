<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableJenisObjekwisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jenis_objekwisata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('jenis_objekwisata',10);
            $table->timestamps();
        });
        Schema::table('detail_objek_wisata', function (Blueprint $table) {
            $table->foreign('id_jenis_objekwisata')
                  ->references('id')
                  ->on('jenis_objekwisata')
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
        Schema::drop('jenis_objekwisata');
    }
}
