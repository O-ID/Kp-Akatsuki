<?php

namespace App\Http\Controllers;

use App\kontakku;
use App\modJangka;
use App\modJurusan;
use App\modOrtu;
use App\modPendaftar;
use App\modRegistrasi;
use App\modTapel;
use App\modWali;
use Illuminate\Http\Request;

class kontakkuc extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = kontakku::all();
        return view('page.table', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hasil= $request->tbpesertadidik.', ';//name dari input tbpesertadidik,beratbadan,jarakrumahsiswa,wtks,sodara
        $hasil.= $request->beratbadan.', ';
        $hasil.= $request->jarakrumahsiswa.', ';
        $hasil.= $request->wtks.', ';
        $hasil.= $request->forjk;
        return $request->all();
        // return redirect('/') -> with('status', 'Sukses Input Data '.$hasil);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //manual create
    public function daftar()
    {
        return view('conten.daftar');
    }
}
