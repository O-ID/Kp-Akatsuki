<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modJurusan extends Model
{
    protected $table = 'jurusan';
    protected $primaryKey = 'id_jurusan';
    public $timestamps = false;
}
