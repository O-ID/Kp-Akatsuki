<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\JenisTransaksi;
use Auth;
use App\Transformers\JenisTransaksiTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class JenisTransaksiController extends Controller
{    
    public function get(Request $request)
    {
        $limit = 10;
        $param = [];
        $data = JenisTransaksi::orderBy('jenis_transaksi.id_jenis_transaksi', 'desc');
        if($request->exists('limit')){
            $limit = $request->limit;
            $param['limit']=$request->limit;
        }
        if($request->exists('kategori')){
            $data = $data->where('jenis_transaksi.kategori', '=', $request->kategori );
            $param['kategori'] = $request->id_owner;
        }
        $data = $data->paginate($limit)
                ->appends($param);
        return fractal()
            ->collection($data)
            ->transformWith(new JenisTransaksiTransformer)
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->toArray();
    }

    public function getWithItem(Request $request)
    {
        $limit = 10;
        $param = [];
        $data = JenisTransaksi::orderBy('jenis_transaksi.id_jenis_transaksi', 'desc');
        if($request->exists('limit')){
            $limit = $request->limit;
            $param['limit']=$request->limit;
        }
        $data = $data->paginate($limit)
                ->appends($param);
        return fractal()
            ->collection($data)
            ->transformWith(new JenisTransaksiTransformer)
			->includeTransaksi()
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->toArray();
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'nama_jenis_transaksi' => 'required|min:3|max:100',
        ]);
        $data =  JenisTransaksi::create([
            'id_bisnis' => $request->id_bisnis,
            'nama_jenis_transaksi' => $request->nama_jenis_transaksi,
        ]);
        return fractal()
            ->item($data)
            ->transformWith(new JenisTransaksiTransformer)
            ->toArray();
    }

    public function put(Request $request, $id)
    {
        $this->validate($request, [
            'nama_jenis_transaksi' => $request->exists('nama_jenis_transaksi') ? 'required|min:3|max:100' : '',
        ]);
        $data = JenisTransaksi::find($id);
        $data->id_bisnis = $request->get('id_bisnis', $data->id_bisnis);
        $data->nama_jenis_transaksi = $request->get('nama_jenis_transaksi', $data->nama_jenis_transaksi);
        $data->save();
        return fractal()
            ->item($data)
            ->transformWith(new JenisTransaksiTransformer)
            ->toArray();
    }
}