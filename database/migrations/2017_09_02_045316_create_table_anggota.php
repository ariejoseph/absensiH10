<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAnggota extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kelompok')->unsigned();
            $table->integer('id_jemaat')->unsigned();
            $table->foreign('id_kelompok')->references('id')->on('kelompok');
            $table->foreign('id_jemaat')->references('id')->on('users');
            $table->unique(['id_jemaat']);
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
        Schema::drop('anggota');
    }
}
