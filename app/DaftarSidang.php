<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarSidang extends Model
{
    protected $table = 'daftar_sidang';

    public $timestamps = false;

    protected $fillable = ['sidang'];
}
