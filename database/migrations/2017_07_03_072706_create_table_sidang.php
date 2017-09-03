<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSidang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sidang', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->string('sesi');
            $table->time('start');
            $table->time('end');
            $table->integer('hall');
            $table->string('lokasi');
            $table->string('kelompok')->nullable();
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
        Schema::drop('sidang');
    }
}
