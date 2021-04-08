<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Bisnis extends Model
{
    protected $table = 'bisnis';
    protected $primaryKey = 'id_bisnis';
    public $timestamps = false;
    protected $guarded = [];
}