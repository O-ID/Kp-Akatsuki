<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Owner;
use App\Bisnis;
use Auth;
use Config\Helper;
use App\Transformers\OwnerTransformer;

class OwnerController extends Controller
{
    public function post(Request $request){
        $this->validate($request, [
            'nama_owner' => 'required|min:3',
            'nomor_telepon' => 'required|numeric|min:10',
            'email' => 'email|required|unique:owner',
            'password' => 'required|min:6',
        ]);
        $owner =  Owner::create([
            'id_owner' => null,
            'nama_owner' => $request->nama_owner,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'password' => bcrypt($request->password),
            'api_token' => bcrypt($request->email),
            'fcm_token' => $request->fcm_token,
        ]);
        $bisnis = Bisnis::create([
            'id_owner' => $owner->id_owner,
            'nama_bisnis' => 'Bisnis Utama',
        ]);
        return fractal()
            ->item($owner)
            ->transformWith(new OwnerTransformer)
            ->addMeta([
                'token' => $owner->api_token,
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
        if(Auth::guard('owner')->attempt($credential)){
            $akun =  Owner::find(Auth::guard('owner')->id());
            return fractal()
                ->item($akun)
                ->transformWith(new OwnerTransformer)
                ->addMeta([
                    'token' => $akun->api_token,
                ])
                ->toArray();
        }
        else{
            return response()->json(['error' => 'email atau password salah'], 401);
        } 
    }

    public function put(Request $request, $id)
    {
        $owner = Owner::find($id);
        $owner->nama_owner = $request->get('nama_owner', $owner->nama_owner);
        $owner->email = $request->get('email', $owner->email);
        $owner->nomor_telepon = $request->get('nomor_telepon', $owner->nomor_telepon);
        $owner->fcm_token = $request->get('fcm_token', $owner->fcm_token);
        if($request->password)
        {
            $owner->password = bcrypt($request->password);
        }
        $owner->save();
        return response()->json(['message' => 'updated'], 200);
    }
}
