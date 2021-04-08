<?php

namespace App\Transformers;

use App\JenisSatuan;
use League\Fractal\TransformerAbstract;
use App\Owner;
use App\Transformers\OwnerTransformer;

class JenisSatuanTransformer extends TransformerAbstract
{
    // protected $availableIncludes = ['owner'];

    public function transform(JenisSatuan $model)
    {
        return [
            'id_jenis_satuan' => $model->id_jenis_satuan,
            'nama_jenis_satuan' => $model->nama_jenis_satuan,
        ];
    }

    // public function includeSatuan(JenisSatuan $model)
    // {
    //     $data = Satuan::where($model->id_jenis_satuan)->get();
    //     return $this->item($data, new OwnerTransformer);
    // }
}