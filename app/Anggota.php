<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'anggota';

    // disable timestamps created_at updated_at
    public $timestamps = false;
    
    protected $fillable = ['id_kelompok', 'id_jemaat'];
}
