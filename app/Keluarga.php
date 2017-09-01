<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keluarga extends Model
{
    protected $table = 'keluarga';

    // disable timestamps created_at updated_at
    public $timestamps = false;
    
    protected $fillable = ['id_jemaat', 'hubungan', 'nama', 'status'];
}
