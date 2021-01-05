<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modPendaftar;
use App\modRegistrasi;
use DataTables;
use Illuminate\Support\Facades\Session;

class PendaftarController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');
        if(!Session::has('LoginAdmin'))
        {
            return redirect()->back();
        }
    }

    public function index()
    {  
        return view('page.admin.validasi');
    }

    public function dataTable()
    {
        $data = modPendaftar::
            join('registrasi', 'registrasi.id_pendaftar', '=', 'pendaftar.id_pendaftar')
            ->join('jurusan', 'jurusan.id_jurusan', '=', 'pendaftar.id_jurusan')
            ->orderBy('pendaftar.id_pendaftar', 'desc')->get();
        return DataTables::of($data)
        ->addColumn('action', function ($data) {
            return '
            <a href="'. route('admin.pendaftar.status', [$data->id_registrasi, "1"]) .'" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Terima">
                <i class="material-icons">check</i>
                <div class="ripple-container"></div>
            </a>
            <a href="'. route('admin.pendaftar.status', [$data->id_registrasi, "2"]) .'" rel="tooltip" title="" class="btn btn-warning btn-link btn-sm" data-original-title="Tolak">
                <i class="material-icons">close</i>
                <div class="ripple-container"></div>
            </a>
            ';
        })
        ->addColumn('status', function ($data) {
            if($data->status == "0"){
                return '<span class="badge badge-secondary">Menunggu Konfirmasi</span>';
            }else if($data->status == "1")  {
                return '<span class="badge badge-primary">Diterima</span>';
            }else {
                return '<span class="badge badge-danger">Ditolak</span>';
            }
            
        })
        ->rawColumns(['status', 'action'])
        ->make(true);
    }

    public function status($id, $status)
    {
        $modRegistrasi = modRegistrasi::find($id);
        $modRegistrasi->status = $status;
        $modRegistrasi->save();
        return redirect()->back();
    }
}