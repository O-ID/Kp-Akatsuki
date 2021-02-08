<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Denah extends Model
{
    protected $table = 'denah';
    protected $primaryKey = 'id_denah';
    public $timestamps = false;
    protected $guarded = [];
}