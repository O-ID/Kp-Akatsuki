<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class JenisSatuan extends Model
{
    protected $table = 'jenis_satuan';
    protected $primaryKey = 'id_jenis_satuan';
    public $timestamps = false;
    protected $guarded = [];
}