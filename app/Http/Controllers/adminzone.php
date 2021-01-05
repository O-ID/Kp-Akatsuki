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

        if(Session::has('LoginAdmin'))
        {
        $hasil=new modTapel();

        $hasil->tapel=$request->tapel_y1.'-'.$request->tapel_y2;
        $hasil->status=0;
        $hasil->save();
        return redirect()->back();
        }
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
        if(Session::has('LoginAdmin'))
        {
            modTapel::where('status', 1)->update(['status'=>0]);
            $tap=modTapel::find($id);
            $tap->status=$request->status;
            $tap->save();
            return redirect('admin/manajemen')->with('status', $tap->tapel.' Sekarang Sudah Aktif');
        }
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
    // public function getBasicData()
    // {
    //     $users = modRegistrasi::select('registrasi.id_registrasi', 'registrasi.status','pendaftar.id_jurusan', 'registrasi.tgl_registrasi', 'pendaftar.nama_lengkap','jurusan.nama_jurusan')
    //     ->join('pendaftar', 'pendaftar.id_pendaftar', '=', 'registrasi.id_pendaftar')
    //     ->join('jurusan', 'jurusan.id_jurusan','=', 'pendaftar.id_jurusan')
    //     ->get();

    //     return Datatables::of($users)->make();
    // }
    // public function getBasic()
    // {
    //     if(Session::has('LoginAdmin'))
    //     {
    //         return view('page.admin.validasi');
    //     }
    //     else
    //     {
    //         return redirect()->back();
    //     }
    // }
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
        if(Session::has('LoginAdmin'))
        {
            $simpan=new modJangka();
            $tap=$simpan::where('id_tapel', $request->tapeljangka)->first();
            if (!$tap) {
                $simpan->id_tapel=$request->tapeljangka;
                $simpan->mulai=$request->buka;
                $simpan->selesai=$request->tutup;
                if ($simpan->save()) {
                    return redirect('admin/manajemen')->with('status', 'Jangka Daftar Berhasil Ditambahkan');
                }else{
                    return redirect()->back()->with('errorr', 'Jangka Daftar Gagal Ditambahkan');
                }
            }else{
                return redirect()->back()->with('errorr', 'Data sudah ada, mohon pilih tahun pelajaran dengan benar');
            }
        }
    }
    public function getJurusan(){
        $data = modJurusan::all();
        return Datatables::of($data)
        ->addColumn('aksi', function($data){
            return
            '
            <button type="button" class="btn btn-warning btn-link btn-sm" data-toggle="modal" data-target="#exampleModalCenter'.$data->id_jurusan.'">
                <i class="material-icons">edit</i>
                <div class="ripple-container"></div>
            </button>
            <div class="modal fade" id="exampleModalCenter'.$data->id_jurusan.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="'.route('admin.jurusan.put', $data->id_jurusan).'" method="post">
                            <input type="hidden" name="_method" value="PUT">
                            '.csrf_field().'
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Jurusan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <label class="bmd-label-floating">ID Jurusan</label>
                                <input readOnly type="text" class="form-control" value="'.$data->id_jurusan.'" name="ideditjurusan" required>
                                <label class="bmd-label-floating">Nama Jurusan</label>
                                <input type="text" class="form-control" value="'.$data->nama_jurusan.'" name="namaeditjurusan" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm mr-2" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-warning btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <button type="button" class="btn btn-danger btn-link btn-sm" data-toggle="modal" data-target="#hapusexampleModalCenter'.$data->id_jurusan.'">
                <i class="material-icons">delete</i>
                <div class="ripple-container"></div>
            </button>
            <div class="modal fade" id="hapusexampleModalCenter'.$data->id_jurusan.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Hapus Jurusan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h3>Yakin ingin menghapus Jurusan '.$data->nama_jurusan.' ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm mr-2" data-dismiss="modal">Batal</button>
                            <form method="POST" action="'.route('admin.jurusan.hapus', $data->id_jurusan).'">
                                '.csrf_field().'
                                '.method_field("DELETE").'
                                <button type="submit" class="btn btn-danger btn-sm">Ya, Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            ';
        })
        ->rawColumns(['aksi'])
        ->make(true);
    }
    public function updateJurusan(Request $request, $id){
        if(Session::has('LoginAdmin'))
        {
            modJurusan::where('id_jurusan', $id)->update(['nama_jurusan'=> $request->namaeditjurusan]);
            return redirect()->back()->with('status', 'Jurusan Berhasil Di Edit');
        }
    }
    public function hapusJurusan($id){
        if(Session::has('LoginAdmin'))
        {
            $jur=modJurusan::findOrFail($id);
            if ($jur->delete()) {
                return redirect()->back()->with('status', $jur->nama_jurusan.' Berhasil Dihapus');
            }else{
                return redirect()->back()->with('status', $jur->nama_jurusan.' Gagal Dihapus');
            }

        }
    }
    public function storeJurusan(Request $request){
        if(Session::has('LoginAdmin'))
        {
            $tambah=new modJurusan();
            $tambah->nama_jurusan=$request->tnamajurusan;
            if ($tambah->save()) {
                return redirect()->back()->with('status', 'Jurusan Berhasil Ditambah');
            }else{
                return redirect()->back()->with('errorr', 'Jurusan Gagal Ditambah');
            }
        }
    }
}
