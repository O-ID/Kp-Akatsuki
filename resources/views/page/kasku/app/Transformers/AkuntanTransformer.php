<?php

namespace App\Transformers;

use App\Akuntan;
use League\Fractal\TransformerAbstract;
use App\Bisnis;
use App\Transformers\BisnisTransformer;

class AkuntanTransformer extends TransformerAbstract
{
	protected $availableIncludes = ['bisnis'];

    public function transform(Akuntan $model)
    {
        return [
            'id_owner' => $model->id_owner,
            'id_akuntan' => $model->id_akuntan,
            'nama_akuntan' => $model->nama_akuntan,
            'email' => $model->email,
        ];
    }

     public function includeBisnis(Akuntan $model)
    {
        $data = Bisnis::where('id_owner', $model->id_owner)->get();
        return $this->collection($data, new BisnisTransformer);
    }
}