<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Struktur;
use DataTables;
use Illuminate\Support\Facades\File;

class StrukturController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    public function index()
    {  
        return view('page.admin.struktur.struktur-index');
    }

    public function dataTable()
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
    }

    public function edit($id)
    {
        $struktur = Struktur::find($id);
        return view('page.admin.struktur.struktur-form', [
            'struktur'  => $struktur,
        ]);
    }

    public function update(Request $request, $id)
    {
        $struktur = Struktur::find($id);
        $struktur->nama_pejabat = $request->get('nama_pejabat', $struktur->nama_pejabat);
        $struktur->save();

        return redirect(route('admin.struktur.index'));
    }
    
}