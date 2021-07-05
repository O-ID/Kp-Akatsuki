@extends('desain.menu')
@section('halaman', 'Detail Pendaftar')
@section('content')
<div class="row ld ld-throw-btt-in">
        <div class="card card-chart">
            <div class="card-header card-header-primary">
                <div class="text-center">
                    <h2 class="mb-0 font-weight-bold">
                        Detail Data Pendaftar
                    </h2>
                    <h4 class="mt-0">SMKS ISLAM TANJUNG</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    @foreach ($data as $datas )
                    <h4>Data Pendaftar</h4>
                        <div class="row">
                            <div class="col-sm-3">
                                Nama : {{ $datas->nama_lengkap }}
                            </div>
                            <div class="col-sm-3">
                                NIK : {{ $datas->nik }}
                            </div>
                            <div class="col-sm-3">
                                Tetala : {{ $datas->tmpt_lahir.", ".$datas->tgl_lahir }}
                            </div>
                            <div class="col-sm-3">
                                No. Hp : {{ $datas->no_hp }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                Email : {{ $datas->email }}
                            </div>
                            <div class="col-sm-3">
                                KPS : {{ $datas->no_kps==null?"Tidak Ada":$datas->no_kps }}
                            </div>
                            <div class="col-sm-3">
                                Jurusan : {{ $datas->nama_jurusan }}
                            </div>
                            <div class="col-sm-3">
                            </div>
                        </div>
                        <h4>Data Orang Tua</h4>
                        <div class="row">
                            <div class="col-sm-3">
                                Nama Ayah : {{ $datas->nama_ayah }}
                            </div>
                            <div class="col-sm-3">
                                Pekerjaan Ayah : {{ $datas->pekerjaan_ayah }}
                            </div>
                            <div class="col-sm-3">
                                Nama Ibu : {{ $datas->nama_ibu }}
                            </div>
                            <div class="col-sm-3">
                                Pekerjaan Ibu : {{ $datas->pekerjaan_ibu }}
                            </div>
                        </div>
                        <br>
                        <h4>Data Wali</h4>
                        <div class="row">
                            <div class="col-sm-3">
                                Nama Wali : {{ $datas->nama_wali }}
                            </div>
                            <div class="col-sm-3">
                                Pekerjaan : {{ $datas->pekerjaan_wali }}
                            </div>
                        </div>
                        <br>
                        <h4>Data Sekolah Asal dan Ijazah</h4>
                        <div class="row">
                            <div class="col-sm-3">
                                Nama Sekolah Asal : {{ $datas->nama_sekolah_asal }}
                            </div>
                            <div class="col-sm-3">
                                NPSN Sekolah Asal : {{ $datas->npsn_sekolah_asal }}
                            </div>
                            <div class="col-sm-3">
                                NISN : {{ $datas->nis }}
                            </div>
                            <div class="col-sm-3">
                                No Seri Ijazah  : {{ $datas->no_seri_ijazah }}
                            </div>
                            <div class="col-sm-3">
                                No SKHUN : {{ $datas->no_seri_skhun }}
                            </div>
                        </div>
                        <br>
                        <h4>Data Lainnya</h4>
                        <div class="row">
                            <div class="col-sm-3">
                                Tinggi Badan : {{ $datas->tinggi_badan }} cm
                            </div>
                            <div class="col-sm-3">
                                Berat Badan : {{ $datas->berat_badan }} kg
                            </div>
                            <div class="col-sm-3">
                                Jarak Tempuh Kesekolah : {{ $datas->jarak_sekolah }} km
                            </div>
                            <div class="col-sm-3">
                                Jumlah Saudara Kandung  : {{ $datas->jumlah_saudara }} orang
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer">
                <div class="container">
                    <div class="row">
                        <div class="col text-left">
                            <a href="{{route('admin.pendaftar.index')}}" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
