<?php

namespace App\Transformers;

use App\JenisTransaksi;
use League\Fractal\TransformerAbstract;
use App\Transaksi;
use App\Transformers\TransaksiTransformer;

class JenisTransaksiTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['transaksi'];
    

    public function transform(JenisTransaksi $model)
    {
        return [
            'id_jenis_transaksi' => $model->id_jenis_transaksi,
            'nama_jenis_transaksi' => $model->nama_jenis_transaksi,
            'id_bisnis' => $model->id_bisnis,
            'kategori' => $model->id_bisnis == null ? "Umum" : "Custom",
        ];
    }

    public function includeTransaksi(JenisTransaksi $model)
    {
        $data = Transaksi::where('id_jenis_transaksi', $model->id_jenis_transaksi)->get();
        return $this->collection($data, new TransaksiTransformer);
    }
}