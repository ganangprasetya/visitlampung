<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiWisata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_wisata', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tanggal');
            $table->integer('id_objekwisata')->unsigned()->index();
            $table->integer('id_user')->unsigned()->index();
            $table->timestamps();
            $table->foreign('id_objekwisata')
                  ->references('id')
                  ->on('detail_objek_wisata')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->foreign('id_user')
                  ->references('id')
                  ->on('users')
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
        Schema::drop('transaksi_wisata');
    }
}
