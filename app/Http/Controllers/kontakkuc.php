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
use Illuminate\Support\Facades\DB;
class kontakkuc extends Controller
{
    /**
     * Display a listing of the resourceee.
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
        // $hasil= $request->tbpesertadidik.', ';//name dari input tbpesertadidik,beratbadan,jarakrumahsiswa,wtks,sodara
        // return $request->all();
        $data= new modPendaftar();
        // $data->id_pendaftar=null;
        $data->id_jurusan=1;
        $data->id_ortu=1;
        $data->nama_lengkap=$request->nama;
        $data->jk=$request->forjk;
        $data->nisn=$request->nisn;
        $data->nis=$request->nis;
        $data->no_seri_ijazah=$request->noseriijasah;
        $data->no_seri_skhun=$request->skhun;
        $data->no_un=$request->nunasional;
        $data->nik=$request->nikktp;
        $data->npsn_sekolah_asal=$request->npsn;
        $data->tmpt_lahir=$request->tmptlahirsiswa;
        $data->tgl_lahir=$request->tglLahir;
        $data->agama=$request->foragama;
        $data->berkebutuhan_khusus=$request->kebutuhansiswa;
        $data->alamat_asal=$request->alamat;
        $data->dusun=$request->dusun;
        $data->rt_rw=$request->rt."/".$request->rw;
        $data->desa=$request->kelurahan;
        $data->kecamatan=$request->kecamatan;
        $data->kota=$request->kabupaten;
        $data->provinsi=$request->provinsi;
        $data->jenis_tinggal=$request->jenistinggal;
        $data->no_telp_rumah=$request->notelprumahsiswa;
        $data->no_hp=$request->nohpsiswa;
        $data->email=$request->email;
        $data->no_kks=$request->nokks;
        $data->no_kps=$request->kps;
        $data->alasan_layak=$request->alasanlayak;
        $data->no_kip=$request->nokip;
        $data->nama_kip=$request->namakip;
        $data->alasan_tolak_kip=$request->tolakkip;
        $data->no_rek_akta_lahir=$request->aktalahir;
        $data->lintang=$request->lintang;
        $data->bujur=$request->Bujur;
        $data->tinggi_badan=$request->tbpesertadidik;
        $data->berat_badan=$request->beratbadan;
        $data->jarak_sekolah=$request->jarakrumahsiswa;
        $data->waktu_tempuh_sekolah=$request->wtks.'00';
        $data->jumlah_saudara=$request->sodara;

        if($data->save()){
            return redirect('/') -> with('status', 'Selamat '.$request->nama.' Dengan ID '.$data->id.' Pendaftaranmu Telah Kami Terima, Mohon Tunggu Pengumuman Selanjutnya.');
        }else{
            return redirect()->back();
        }
        // echo $data->id;
        // $hasil= DB::table('pendaftar')->insertGetId([
        //     'nama_lengkap'=>$request->nama,
        //     'jk'=>$request->forjk,
        //     'nisn'=>$request->nisn,
        //     'nis'=>$request->nis,
        //     'no_seri_ijazah'=>$request->noseriijasah,
        //     'no_seri_skhun'=>$request->skhun,
        //     'no_un'=>$request->nunasional,
        //     'nik'=>$request->nikktp,
        //     'npsn_sekolah_asal'=>$request->npsn,
        //     'tmpt_lahir'=>$request->tmptlahirsiswa,
        //     'tgl_lahir'=>$request->tglLahir,
        //     'agama'=>$request->foragama,
        //     'berkebutuhan_khusus'=>$request->kebutuhansiswa,
        //     'alamat_asal'=>$request->alamat,
        //     'dusun'=>$request->dusun,
        //     'rt_rw'=>$request->rt."/".$request->rw,
        //     'desa'=>$request->kelurahan,
        //     'kecamatan'=>$request->kecamatan,
        //     'kota'=>$request->kabupaten,
        //     'provinsi'=>$request->provinsi,
        //     'jenis_tinggal'=>$request->jenistinggal,
        //     'no_telp_rumah'=>$request->notelprumahsiswa,
        //     'no_hp'=>$request->nohpsiswa,
        //     'email'=>$request->email,
        //     'no_kks'=>$request->nokks,
        //     'no_kps'=>$request->kps,
        //     'alasan_layak'=>$request->alasanlayak,
        //     'no_kip'=>$request->nokip,
        //     'nama_kip'=>$request->namakip,
        //     'alasan_tolak_kip'=>$request->tolakkip,
        //     'no_rek_akta_lahir'=>$request->aktalahir,
        //     'lintang'=>$request->lintang,
        //     'bujur'=>$request->Bujur,
        //     'tinggi_badan'=>$request->tbpesertadidik,
        //     'berat_badan'=>$request->beratbadan,
        //     'jarak_sekolah'=>$request->jarakrumahsiswa,
        //     'waktu_tempuh_sekolah'=>$request->wtks,
        //     'jumlah_saudara'=>$request->sodara,
        // ]);
        // if($hasil!=0){
        //     return redirect('/') -> with('status', 'Selamat '.$request->nama.' Pendaftaranmu Telah Kami Terima, Mohon Tunggu Pengumuman Selanjutnya.');
        // }else{
        //     return redirect()->back();
        // }
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
