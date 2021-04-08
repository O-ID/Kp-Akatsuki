<?php

namespace App\Transformers;

use App\Owner;
use League\Fractal\TransformerAbstract;

class OwnerTransformer extends TransformerAbstract
{
    public function transform(Owner $model)
    {
        return [
            'id_owner' => $model->id_owner,
            'nama_owner' => $model->nama_owner,
            'email' => $model->email,
            'nomor_telepon' => $model->nomor_telepon,
            // 'fcm_token' => $model->fcm_token,
            // 'created_at' => $model->created_at->diffForHumans(),
            // 'updated_at' => $model->updated_at->diffForHumans(),
        ];
    }
}