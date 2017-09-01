<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKeluarga extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluarga', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_jemaat')->unsigned();
            $table->string('hubungan');
            $table->string('nama');
            $table->string('status');
            $table->foreign('id_jemaat')->references('id')->on('users');
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
        Schema::drop('keluarga');
    }
}
