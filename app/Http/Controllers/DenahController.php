<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Denah;
use DataTables;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class DenahController extends Controller
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
            return view('page.admin.denah.denah-index');
        }else{
            return redirect('/')->with('status', 'Anda Bukan Admin');
        }
    }

    public function dataTable()
    {
        if(Session::has('LoginAdmin'))
        {
            $data = Denah::orderBy('denah.id_denah', 'desc')->get();
            return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '
                    <a href="'. route('admin.denah.edit', $data->id_denah) .'" rel="tooltip" title="" class="btn btn-primary btn-link btn-sm" data-original-title="Edit">
                        <i class="material-icons">edit</i>
                        <div class="ripple-container"></div>
                    </a>
                ';
            })
            ->addColumn('foto_tempat', function ($data) {
                return isset($data->foto_tempat) ? '<img src="' . asset('assets/img/denah/' . $data->foto_tempat) . '" style="width:50px">' : null;
            })
            ->rawColumns(['action', 'foto_tempat'])
            ->make(true);
        }else{
            return redirect('/')->with('status', 'Anda Bukan Admin');
        }
    }

    public function edit($id)
    {
        if(Session::has('LoginAdmin'))
        {
            $denah = Denah::find($id);
            return view('page.admin.denah.denah-form', [
                'denah'  => $denah,
            ]);
        }else{
            return redirect('/')->with('status', 'Anda Bukan Admin');
        }
    }

    public function update(Request $request, $id)
    {
        
        if(Session::has('LoginAdmin'))
        {
            $denah = Denah::find($id);
            
            $img_name = date("dmyHis") . "." . $request->file('foto_tempat')->getClientOriginalExtension();
            Storage::disk('denah')->put($img_name,  File::get($request->file('foto_tempat'))) ? File::Delete(public_path() . '/assets/img/denah/' . $denah->foto_tempat) : null;

            $denah->foto_tempat = $img_name;
            $denah->save();

            return redirect(route('admin.denah.index'));
        }else{
            return redirect('/')->with('status', 'Anda Bukan Admin');
        }
    }

}
