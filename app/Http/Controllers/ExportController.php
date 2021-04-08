<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\PendaftarExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class ExportController extends Controller
{
    
    // public function __construct()
    // {
    //     if(!Session::has('LoginAdmin'))
    //     {
    //         return redirect()->back();
    //     }
    // }

    public function pendaftar(Request $request)
    {
        if($request->status == '1') {
            $name = 'Pendaftar Lulus.xlsx';
        }
        else if($request->status == '0') {
            $name = 'Pendaftar Tidak Lulus.xlsx';
        }
        else {
            $name = 'Semua Pendaftar.xlsx';
        }
        return Excel::download(new PendaftarExport($request->status), $name);
    }
}
