<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Akuntan;
use App\Bisnis;
use Auth;
use App\Transformers\AkuntanTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class AkuntanController extends Controller
{
    public function get(Request $request)
    {
        $limit = 10;
        $param = [];
        $data = Akuntan::orderBy('akuntan.id_akuntan', 'desc');
        if ($request->exists('nama_akuntan')) {
            $data = $data->where('akuntan.nama_akuntan', 'LIKE', "%" . $request->nama_akuntan . "%");
            $param['nama_akuntan'] = $request->nama_akuntan;
        }
        if ($request->exists('id_owner')) {
            $data = $data->where('akuntan.id_owner', '=', $request->id_owner);
            $param['id_owner'] = $request->id_owner;
        }
        if ($request->exists('limit')) {
            $limit = $request->limit;
            $param['limit'] = $request->limit;
        }
        $data = $data->paginate($limit)
            ->appends($param);
        return fractal()
            ->collection($data)
            ->transformWith(new AkuntanTransformer)
            ->includeOwner()
            ->paginateWith(new IlluminatePaginatorAdapter($data))
            ->toArray();
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'nama_akuntan' => 'required|min:3',
            'email' => 'email|required|unique:akuntan',
            'password' => 'required|min:6',
        ]);
        $akuntan =  Akuntan::create([
            'id_owner' => $request->id_owner,
            'nama_akuntan' => $request->nama_akuntan,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'api_token' => bcrypt($request->email),
            'fcm_token' => $request->fcm_token,
        ]);
        return fractal()
            ->item($akuntan)
            ->transformWith(new AkuntanTransformer)
            ->addMeta([
                'token' => $akuntan->api_token,
            ])
            ->toArray();
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        $credential = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if (Auth::guard('akuntan')->attempt($credential)) {
            $akun =  Akuntan::find(Auth::guard('akuntan')->id());
            $bisnis = Bisnis::where('id_owner', '=', $akun->id_owner)->get();
            return fractal()
                ->item($akun)
                ->includeBisnis()
                ->transformWith(new AkuntanTransformer)
                ->addMeta([
                    'token' => $akun->api_token,
                ])
                ->toArray();
        } else {
            return response()->json(['error' => 'email atau password salah'], 401);
        }
    }

    public function put(Request $request, $id)
    {
        $akuntan = Akuntan::find($id);
        $akuntan->nama_akuntan = $request->get('nama_akuntan', $akuntan->nama_akuntan);
        $akuntan->email = $request->get('email', $akuntan->email);
        $akuntan->fcm_token = $request->get('fcm_token', $akuntan->fcm_token);
        if ($request->password) {
            $akuntan->password = bcrypt($request->password);
        }
        $akuntan->save();
        return response()->json(['message' => 'updated'], 200);
    }
}
