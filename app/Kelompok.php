<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelompok extends Model
{
    protected $table = 'kelompok';

    // disable timestamps created_at updated_at
    public $timestamps = false;
    
    protected $fillable = ['id_koordinator', 'id_asisten', 'id_jemaat', 'id_sidang'];
}
