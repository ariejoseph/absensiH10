<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    // disable timestamps created_at updated_at
    public $timestamps = false;
    
    protected $fillable = ['id', 'sidang', 'tanggal'];
}
