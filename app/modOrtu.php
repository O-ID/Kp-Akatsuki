<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modOrtu extends Model
{
    protected $table = 'ortu';
    protected $primaryKey = 'id_ortu';
    public $timestamps = false;
}
