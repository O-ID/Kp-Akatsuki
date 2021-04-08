<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class JenisTransaksi extends Model
{
    protected $table = 'jenis_transaksi';
    protected $primaryKey = 'id_jenis_transaksi';
    public $timestamps = false;
    protected $guarded = [];
}