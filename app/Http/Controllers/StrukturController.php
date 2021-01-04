<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Struktur;
use DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class StrukturController extends Controller
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
        if(Session::has('LoginAdmin'))
        {
            return view('page.admin.struktur.struktur-index');
        }else{
            return redirect('/')->with('status', 'Anda Bukan Admin');
        }
    }

    public function dataTable()
    {
        if(Session::has('LoginAdmin'))
        {
            $data = Struktur::orderBy('struktur.id_struktur', 'desc')->get();
            return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '
                    <a href="'. route('admin.struktur.edit', $data->id_struktur) .'" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit">
                        <i class="material-icons">edit</i>
                        <div class="ripple-container"></div>
                    </a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
        }else{
            return redirect('/')->with('status', 'Anda Bukan Admin');
        }
    }

    public function edit($id)
    {
        if(Session::has('LoginAdmin'))
        {
            $struktur = Struktur::find($id);
            return view('page.admin.struktur.struktur-form', [
                'struktur'  => $struktur,
            ]);
        }else{
            return redirect('/')->with('status', 'Anda Bukan Admin');
        }
    }

    public function update(Request $request, $id)
    {
        if(Session::has('LoginAdmin'))
        {
            $struktur = Struktur::find($id);
            $struktur->nama_pejabat = $request->get('nama_pejabat', $struktur->nama_pejabat);
            $struktur->save();

            return redirect(route('admin.struktur.index'));
        }else{
            return redirect('/')->with('status', 'Anda Bukan Admin');
        }
    }

}
