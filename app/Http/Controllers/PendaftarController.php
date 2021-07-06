<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\modPendaftar;
use App\modRegistrasi;
use App\modJurusan;
use App\modOrtu;
use DataTables;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;

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
        return FacadesDataTables::of($data)
        ->addColumn('action', function ($data) {
            return '
            <a href="'. route('admin.pendaftar.edit', $data->id_pendaftar) .'" rel="tooltip" title="" class="btn btn-warning btn-link btn-sm" data-original-title="Edit Data Pendaftar">
                <i class="material-icons">edit</i>
                <div class="ripple-container"></div>
            </a>
            <a href="'. route('admin.pendaftar.status', [$data->id_registrasi, "3"]) .'" rel="tooltip" title="" class="btn btn-success btn-link btn-sm" data-original-title="Lihat Data Pendaftar">
                <i class="material-icons">visibility</i>
                <div class="ripple-container"></div>
            </a>
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
        if($status == 3){
            $data = modPendaftar::
            join('registrasi', 'registrasi.id_pendaftar', '=', 'pendaftar.id_pendaftar')
            ->join('jurusan', 'jurusan.id_jurusan', '=', 'pendaftar.id_jurusan')
            ->join('ortu', 'ortu.id_ortu', '=', 'pendaftar.id_ortu')
            ->leftJoin('wali', 'wali.id_wali', '=', 'pendaftar.id_wali')
            ->where('registrasi.id_registrasi', $id)->get();
            // $data=$data[0];
            // echo json_encode($data);
            return view("page.admin.pendetail", ['data' => $data]);
        }else{
            $modRegistrasi = modRegistrasi::find($id);
            $modRegistrasi->status = $status;
            $modRegistrasi->save();
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $jurusan = modJurusan::get();
        $edit = modPendaftar::join('registrasi', 'registrasi.id_pendaftar', '=', 'pendaftar.id_pendaftar')
        ->join('jurusan', 'jurusan.id_jurusan', '=', 'pendaftar.id_jurusan')
        ->join('ortu', 'ortu.id_ortu', '=', 'pendaftar.id_ortu')
        ->first();
        // dd($jurusan);
        return view('page.admin.form_pendaftar', [
            'edit' => $edit,
            'jurusan' => $jurusan,
        ]);
    }

    public function putPokok($id, Request $request)
    {
        $data = modPendaftar::find($id);
        $data->id_jurusan = $request->id_jurusan;
        $data->nama_lengkap = $request->nama_lengkap;
        $data->alamat_asal = $request->alamat_asal;
        $data->rt_rw = $request->rt .'/'. $request->rw;
        $data->dusun = $request->dusun;
        $data->desa = $request->desa;
        $data->kecamatan = $request->kecamatan;
        $data->kota = $request->kota;
        $data->tmpt_lahir = $request->tmpt_lahir;
        $data->tgl_lahir = $request->tgl_lahir;
        $data->jk = $request->jk;
        $data->agama = $request->agama;
        $data->no_telp_rumah = $request->no_telp_rumah;
        $data->no_hp = $request->no_hp;
        $data->email = $request->email;
        $data->save();
        
        return redirect()->back();
    }

    public function putOrtu($id, Request $request)
    {
        $this->validate($request, [
            'thn_lahir_ayah' => 'required|min:4|numeric',
            'thn_lahir_ibu' => 'required|min:4|numeric',
        ]);
        $pendaftar = modPendaftar::find($id);
        $data = modOrtu::find($pendaftar->id_pendaftar);

        $data->nama_ayah = $request->nama_ayah;
        $data->pekerjaan_ayah = $request->pekerjaan_ayah;
        $data->kebutuhan_khusus_ayah = $request->kebutuhan_khusus_ayah;
        $data->pendidikan_ayah = $request->pendidikan_ayah;
        $data->penghasilan_ayah = $request->penghasilan_ayah;
        $data->thn_lahir_ayah = $request->thn_lahir_ayah;

        $data->nama_ibu = $request->nama_ibu;
        $data->pekerjaan_ibu = $request->pekerjaan_ibu;
        $data->kebutuhan_khusus_ibu = $request->kebutuhan_khusus_ibu;
        $data->pendidikan_ibu = $request->pendidikan_ibu;
        $data->penghasilan_ibu = $request->penghasilan_ibu;
        $data->thn_lahir_ibu = $request->thn_lahir_ibu;
        $data->save();

        return redirect()->back();
    }
}
