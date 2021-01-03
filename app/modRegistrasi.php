<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modRegistrasi extends Model
{
    protected $table = 'registrasi';
    protected $primaryKey = 'id_registrasi';
    public $timestamps = false;
}
