<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jemaat extends Model
{
    protected $table = 'jemaat';

    // disable timestamps created_at updated_at
    public $timestamps = false;
    
    protected $fillable = ['nama', 'alamat', 'tempat_lahir', 'tanggal_lahir'];
}
