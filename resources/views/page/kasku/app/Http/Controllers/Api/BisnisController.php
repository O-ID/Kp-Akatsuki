<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bisnis;
use Auth;
use App\Transformers\BisnisTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class BisnisController extends Controller
{    
    public function get(Request $request)
    {
        $limit = 10;
        $param = [];
        $data = Bisnis::orderBy('bisnis.id_bisnis', 'desc');
        if($request->exists('nama_bisnis')){
            $data = $data->where('bisnis.nama_bisnis', 'LIKE', "%" . $request->nama_bisnis . "%" );
            $param['nama_bisnis'] = $request->nama_bisnis;
        }
        if($request->exists('id_owner')){
            $data = $data->where('bisnis.id_owner', '=', $request->id_owner );
            $param['id_owner'] = $request->id_owner;
        }
        if($request->exists('limit')){
            $limit = $request->limit;
            $param['limit']=$request->limit;
        }
        $data = $data->paginate($limit)
                ->appends($param);
        return fractal()
            ->collection($data)
            ->transformWith(new BisnisTransformer)
			->includeOwner()
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->toArray();
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'nama_bisnis' => 'required|min:3|max:100',
        ]);
        Bisnis::create([
            'id_owner' => Auth::guard('api-owner')->id(),
            'nama_bisnis' => $request->nama_bisnis,
        ]);
        return response()->json(['message' => 'created'], 201);
    }

    public function put(Request $request, $id)
    {
        $this->validate($request, [
            'nama_bisnis' => $request->exists('nama_bisnis') ? 'required|min:3|max:100' : '',
        ]);
        $data = Bisnis::find($id);
        $data->nama_bisnis = $request->get('nama_bisnis', $data->nama_bisnis);
        return response()->json(['message' => 'updated'], 200);
    }

    public function delete($id)
    {
        $data = Bisnis::find($id);
        $data->delete();
        return response()->json(['message' => 'deleted'],200);
    }
}