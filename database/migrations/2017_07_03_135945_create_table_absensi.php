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
            $table->increments('id')->unsigned();
            $table->integer('id_jemaat')->unsigned();
            $table->string('sidang');
            $table->date('tanggal');
            $table->foreign('id_jemaat')->references('id')->on('jemaat');
            $table->unique(['id_jemaat', 'sidang', 'tanggal']);
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
