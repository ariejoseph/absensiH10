<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sidang extends Model
{
    protected $table = 'sidang';

    // disable timestamps created_at updated_at
    public $timestamps = false;
    
    protected $fillable = ['nama'];

}
