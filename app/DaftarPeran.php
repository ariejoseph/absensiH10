<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaftarPeran extends Model
{
    protected $table = 'daftar_peran';

    public $timestamps = false;

    protected $fillable = ['peran'];
}
