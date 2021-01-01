<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Struktur extends Model
{
    protected $table = 'struktur';
    protected $primaryKey = 'id_struktur';
    public $timestamps = false;
    protected $guarded = [];
}