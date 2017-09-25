<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKelompok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_koordinator')->unsigned();
            $table->integer('id_asisten')->unsigned();
            // $table->integer('id_jemaat')->unsigned();
            $table->string('sidang')->nullable();
            $table->foreign('id_koordinator')->references('id')->on('users');
            $table->foreign('id_asisten')->references('id')->on('users');
            // $table->foreign('id_jemaat')->references('id')->on('users');
            // $table->foreign('id_sidang')->references('id')->on('sidang');
            // $table->unique(['id_koordinator', 'id_asisten']);
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
        Schema::drop('kelompok');
    }
}
