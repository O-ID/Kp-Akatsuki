<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\kontakku;
use App\modJangka;
use App\modJurusan;
use App\modOrtu;
use App\modPendaftar;
use App\modRegistrasi;
use App\modTapel;
use App\modWali;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\Datatables\Datatables;
class adminzone extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }
    public function index()
    {
        //
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
    public function storeTapel(Request $request)
    {

        $hasil=new modTapel();

        $hasil->tapel=$request->tapel_y1.'-'.$request->tapel_y2;
        $hasil->status=0;
        $hasil->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = modRegistrasi::select('registrasi.id_registrasi', 'registrasi.status','pendaftar.id_jurusan', 'registrasi.tgl_registrasi', 'pendaftar.nama_lengkap','jurusan.nama_jurusan')
                ->join('pendaftar', 'pendaftar.id_pendaftar', '=', 'registrasi.id_pendaftar')
                ->join('jurusan', 'jurusan.id_jurusan','=', 'pendaftar.id_jurusan')
                ->get();
        return view('page.table', ['data' => $data]);
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
        //update tapel
        modTapel::where('status', 1)->update(['status'=>0]);
        $tap=modTapel::find($id);
        $tap->status=$request->status;
        $tap->save();
        return redirect('/manajemen')->with('status', 'Berhasil Mengubah '.$tap->tapel);
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
    //adminzone

    public function registerPost(Request $request){
        if(Session::has('LoginAdmin'))
        {
            // return $request->session()->all();
            $this->validate($request, [
                'name' => 'required|min:4',
                'email' => 'required|min:4|email|unique:admin',
                'password' => 'required',
                'confirmation' => 'required|same:password',
            ]);

            $datass =  new kontakku();
            $datass->nama_admin = $request->name;
            $datass->email = $request->email;
            $datass->password = bcrypt($request->password);
            $datass->save();
            // return date('Y-m-d');
            return redirect()->back();
        }
        else
        {
            return redirect()->back();
        }
    }
    public function LoginAdmin(Request $request){
        if ( !empty( $request->email ) && !empty( $request->password ) ) {
            $email = $request->email;
            $password = $request->password;

            $data = kontakku::where('email',$email)->first();
            if($data){ //apakah email tersebut ada atau tidak
                if(Hash::check($password,$data->password)){
                    Session::put('name',$data->nama_admin);
                    Session::put('email',$data->email);
                    Session::put('LoginAdmin',TRUE);
                    return redirect('/')->with('status','Selamat Datang '.$data->nama_admin);
                }
                else{
                    return redirect('/')->with('errorr','Password Anda Salah Salah !');
                }
            }
            else{
                return redirect('/')->with('errorr','Email Anda Salah!');
            }
        }else{
            return redirect('/')->with('errorr','Mohon Isikan Email dan Password Terlebih Dahulu');
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/')->with('status','Anda Sudah Keluar Sebagai Admin');
    }
    public function getBasicData()
    {
        $users = modRegistrasi::select('registrasi.id_registrasi', 'registrasi.status','pendaftar.id_jurusan', 'registrasi.tgl_registrasi', 'pendaftar.nama_lengkap','jurusan.nama_jurusan')
        ->join('pendaftar', 'pendaftar.id_pendaftar', '=', 'registrasi.id_pendaftar')
        ->join('jurusan', 'jurusan.id_jurusan','=', 'pendaftar.id_jurusan')
        ->get();

        return Datatables::of($users)->make();
    }
    public function getBasic()
    {
        if(Session::has('LoginAdmin'))
        {
            return view('page.admin.validasi');
        }
        else
        {
            return redirect()->back();
        }
    }
    public function getManajemen(){
        if(Session::has('LoginAdmin'))
        {
            $dtapel=modTapel::all();
            return view('page.admin.manajemen.index-manajemen', ['dtapel' => $dtapel]);
        }
        else
        {
            return redirect()->back();
        }
    }
    public function getJkdaftar(){
        $data=modJangka::select('status','tapel', 'mulai', 'selesai')
        ->join('tapel', 'jangka_daftar.id_tapel','=','tapel.id_tapel')
        ->get();
        return DataTables::of($data)->make();
    }
    public function getTapel(){
        $data=modTapel::all();
        return DataTables::of($data)
        ->addColumn('statusconv', function($data){
            if($data->status==0){
                return
                '
                <form action="'.route('admin.tapel.put', $data->id_tapel).'" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    '.csrf_field().'
                    <input type="text" name="status" class="d-none" value="1">
                    <button type="submit" class="btn btn-success btn-sm btn-block">Aktifkan</button>
                </form>
                ';
            }else{
                return
                '
                <form action="'.route('admin.tapel.put', $data->id_tapel).'" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    '.csrf_field().'
                    <input type="text" name="status" class="d-none" value="0">
                    <button type="submit" class="btn btn-danger btn-sm btn-block">Nonaktifkan</button>
                </form>
                ';
            }
        })
        ->rawColumns(['statusconv'])
        ->make(true);
    }
    public function storeJkdaftar(Request $request){
        return $request->all();
    }
}
