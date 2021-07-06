<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modPendaftar extends Model
{
    protected $table = 'pendaftar';
    protected $primaryKey = 'id_pendaftar';
    public $timestamps = false;
}
