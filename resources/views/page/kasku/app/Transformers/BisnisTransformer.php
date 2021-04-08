<?php

namespace App\Transformers;

use App\Bisnis;
use App\Owner;
use League\Fractal\TransformerAbstract;
use App\Transformers\OwnerTransformer;

class BisnisTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['owner'];

    public function transform(Bisnis $model)
    {
        return [
            'id_owner' => $model->id_owner,
            'id_bisnis' => $model->id_bisnis,
            'nama_bisnis' => $model->nama_bisnis,
        ];
    }

    public function includeOwner(Bisnis $model)
    {
        $data = Owner::find($model->id_owner);
        return $this->item($data, new OwnerTransformer);
    }
}