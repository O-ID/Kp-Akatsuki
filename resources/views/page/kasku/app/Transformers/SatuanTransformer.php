<?php

namespace App\Transformers;

use App\Satuan;
use League\Fractal\TransformerAbstract;
use App\JenisSatuan;
use App\Transformers\JenisSatuanTransformer;

class SatuanTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['jenisSatuan'];
    public function transform(Satuan $model)
    {
        return [
            'id_satuan' => $model->id_satuan,
            'id_jenis_satuan' => $model->id_jenis_satuan,
            'nama_satuan' => $model->nama_satuan,
        ];
    }

    public function includeJenisSatuan(Satuan $model)
    {
        $data = JenisSatuan::find($model->id_jenis_satuan);
        return $this->item($data, new JenisSatuanTransformer);
    }
}