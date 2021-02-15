<?php

namespace App\Http\Controllers;

use App\modRegistrasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class PrintController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth:admin');
        if(!Session::has('LoginAdmin'))
        {
            return redirect()->back();
        }
    }

    public function printall()
    {
        $data = modRegistrasi::select('registrasi.id_registrasi', 'registrasi.status','pendaftar.id_jurusan', 'registrasi.tgl_registrasi', 'pendaftar.nama_lengkap','jurusan.nama_jurusan', 'pendaftar.tmpt_lahir', 'pendaftar.tgl_lahir')
                ->join('pendaftar', 'pendaftar.id_pendaftar', '=', 'registrasi.id_pendaftar')
                ->join('jurusan', 'jurusan.id_jurusan','=', 'pendaftar.id_jurusan')
                ->get();
        $head='Semua';
        return view('page.admin.print', ['head' => $head, 'data'=> $data]);
    }
    public function kelulusan($id)
    {
        $data = modRegistrasi::select('registrasi.id_registrasi', 'registrasi.status','pendaftar.id_jurusan', 'registrasi.tgl_registrasi', 'pendaftar.nama_lengkap','jurusan.nama_jurusan', 'pendaftar.tmpt_lahir', 'pendaftar.tgl_lahir')
                ->join('pendaftar', 'pendaftar.id_pendaftar', '=', 'registrasi.id_pendaftar')
                ->join('jurusan', 'jurusan.id_jurusan','=', 'pendaftar.id_jurusan')
                ->where('registrasi.status', $id)
                ->get();
        if ($id==1) {
            $head='Kelulusan';
        }else{
            $head='Ketidak Lulusan';
        }
        return view('page.admin.print', ['head' => $head, 'data'=> $data]);
    }
    public function pksprint($id)
    {
        if ($id==1) {
            $data = modRegistrasi::select('registrasi.id_registrasi', 'registrasi.status','pendaftar.id_jurusan', 'registrasi.tgl_registrasi', 'pendaftar.nama_lengkap','jurusan.nama_jurusan', 'pendaftar.tmpt_lahir', 'pendaftar.tgl_lahir', 'pendaftar.no_kps')
                    ->join('pendaftar', 'pendaftar.id_pendaftar', '=', 'registrasi.id_pendaftar')
                    ->join('jurusan', 'jurusan.id_jurusan','=', 'pendaftar.id_jurusan')
                    ->whereNotNull('pendaftar.no_kps')
                    ->get();
                    $head='Penerima PKS';
                    return view('page.admin.print', ['head' => $head, 'data'=> $data]);
        }else{
            $data = modRegistrasi::select('registrasi.id_registrasi', 'registrasi.status','pendaftar.id_jurusan', 'registrasi.tgl_registrasi', 'pendaftar.nama_lengkap','jurusan.nama_jurusan', 'pendaftar.tmpt_lahir', 'pendaftar.tgl_lahir', 'pendaftar.no_kps')
            ->join('pendaftar', 'pendaftar.id_pendaftar', '=', 'registrasi.id_pendaftar')
            ->join('jurusan', 'jurusan.id_jurusan','=', 'pendaftar.id_jurusan')
            ->whereNull('pendaftar.no_kps')
            ->get();
            $head='Tidak Menerima PKS';
            return view('page.admin.print', ['head' => $head, 'data'=> $data]);
        }
    }
}
