<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JenisSatuan;
use Auth;
use App\Transformers\JenisSatuanTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class JenisSatuanController extends Controller
{    
    public function get(Request $request)
    {
        $limit = 10;
        $param = [];
        $data = JenisSatuan::orderBy('jenis_satuan.id_jenis_satuan', 'desc');
        if($request->exists('limit')){
            $limit = $request->limit;
            $param['limit']=$request->limit;
        }
        $data = $data->paginate($limit)
                ->appends($param);
        return fractal()
            ->collection($data)
            ->transformWith(new JenisSatuanTransformer)
			->includeSatuan()
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->toArray();
    }
}