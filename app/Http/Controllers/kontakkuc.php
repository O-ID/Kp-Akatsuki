<?php

namespace App\Http\Controllers;


use App\modJangka;
use App\modJurusan;
use App\modOrtu;
use App\modPendaftar;
use App\modRegistrasi;
use App\modTapel;
use App\modWali;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use function GuzzleHttp\Promise\all;

class kontakkuc extends Controller
{
    /**
     * Display a listing of the resourceee.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = modJangka::select('mulai', 'selesai')
                ->join('tapel', 'tapel.id_tapel', '=', 'jangka_daftar.id_tapel')
                ->where('tapel.status', 1)
                ->get();
        return view('page.index', ['data' => $data]);
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
        $ortu=new modOrtu();
        $ortu->nama_ayah=$request->namaayah;
        $ortu->pekerjaan_ayah=$request->pekerjaanayah;
        $ortu->kebutuhan_khusus_ayah=$request->Kebutuhankhusus;
        $ortu->pendidikan_ayah=$request->forpendayah;
        $ortu->penghasilan_ayah=$request->forpenghayah;
        $ortu->thn_lahir_ayah=$request->thnayah;
        $ortu->nama_ibu=$request->namaibu;
        $ortu->pekerjaan_ibu=$request->pekerjaanibu;
        $ortu->kebutuhan_khusus_ibu=$request->Kebutuhankhususibu;
        $ortu->pendidikan_ibu=$request->forpendibu;
        $ortu->penghasilan_ibu=$request->forpenghibu;
        $ortu->thn_lahir_ibu=$request->thnibu;
        $ortu->save();
        $idortu=$ortu->id;

        //wali
        $wali=new modWali();
        $wali->nama_wali=$request->namawali;
        $wali->pekerjaan_wali=$request->pekerjaanwali;
        $wali->pendidikan_wali=$request->forpendwali;
        $wali->penghasilan_wali=$request->forpenghwali;
        $wali->thn_wali=$request->thnwali;
        $wali->save();
        $idwali=$wali->id;

        //get data tapel
        $tapelid=modTapel::select('tapel.id_tapel')->where('tapel.status', 1)->get();

        //siswa
        $data= new modPendaftar();
        $data->id_jurusan=$request->forjurusan;//jurusan
        $data->id_ortu=$idortu;//ortu
        $data->id_tapel=$tapelid[0]->id_tapel;//tapel
        $data->id_wali=$idwali;//wali
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
        $data->waktu_tempuh_sekolah=$request->wtks;
        $data->jumlah_saudara=$request->sodara;
        $data->save();
        $idsiswa=$data->id;

        //tabel registrasi
        $tgldaptar=date('Y-m-d');
        $daptar=new modRegistrasi();
        $daptar->id_pendaftar=$idsiswa;
        $daptar->tgl_registrasi=$tgldaptar;
        $daptar->status=0;
        if($daptar->save()){
            return redirect('/') -> with('status', 'Selamat '.$request->nama.' Dengan ID '.$daptar->id.' Pendaftaranmu Telah Kami Terima, Mohon Tunggu Pengumuman Selanjutnya.');
        }else{
            return redirect()->back();
        }
        // return $request->all();

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
        $data = modJurusan::all();
        return view('conten.daftar', compact('data'));
    }

}
