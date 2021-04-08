<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Satuan;
use Auth;
use App\Transformers\SatuanTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class SatuanController extends Controller
{    
    public function get(Request $request)
    {
        $limit = 10;
        $param = [];
        $data = Satuan::orderBy('satuan.id_satuan', 'desc');
        if($request->exists('limit')){
            $limit = $request->limit;
            $param['limit']=$request->limit;
        }
        if($request->exists('aktif')){
            $data = $data->where('satuan.aktif', '=', $request->aktif);
            $param['aktif'] = $request->aktif;
        }
        $data = $data->paginate($limit)
                ->appends($param);
        return fractal()
            ->collection($data)
            ->transformWith(new SatuanTransformer)
			->includeJenisSatuan()
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->toArray();
    }
}