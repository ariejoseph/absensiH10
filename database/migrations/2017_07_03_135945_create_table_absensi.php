<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAbsensi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jemaat')->unsigned();
            $table->integer('id_sidang')->unsigned();
            $table->date('tanggal');
            $table->foreign('id_jemaat')->references('id')->on('users');
            $table->foreign('id_sidang')->references('id')->on('sidang');
            $table->unique(['id_jemaat', 'id_sidang', 'tanggal']);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('absensi');
    }
}
