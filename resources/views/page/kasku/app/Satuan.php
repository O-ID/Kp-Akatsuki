<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Satuan extends Model
{
    protected $table = 'satuan';
    protected $primaryKey = 'id_satuan';
    public $timestamps = false;
    protected $guarded = [];
}