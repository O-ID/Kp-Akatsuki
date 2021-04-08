<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Akuntan extends Authenticatable
{
    protected $table = 'akuntan';
    protected $primaryKey = 'id_akuntan';
    public $timestamps = false;
    protected $guarded = [];
}