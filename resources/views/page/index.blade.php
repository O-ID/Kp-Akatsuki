@extends('desain.menu')
@section('halaman', 'Beranda')
@section('content')
<div class="row ld ld-throw-btt-in">
        <div class="card card-chart">
            <div class="card-header card-header-primary">
                <div class="text-center">
                    <h2 class="mb-0 font-weight-bold">Penerimaan Siswa Baru</h2>
                    <h4 class="mt-0">SMK Matsaratul Huda</h4>
                    <img src="/assets/img/new_logo.png" alt="" width="150px">
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <h5 class="card-title">Untuk Melakukan Pendaftaran Klik Tombol Pendaftaran Dibawah</h5>
                            <a href="{{url('/daftar')}}" class="btn btn-warning pull-center">Daftar Sekarang</a>
                        </div>
                      </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="container">
                    <div class="row">
                        <div class="col text-right">
                            <h6 class="text-danger">*Pendaftaran Dimulai Tanggal 29 November 2020 s/d 10 Desember 2020</h6>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        @if(session('status'))
            md.showNotification("top","left","warning","{{ session('status') }}");
        @endif
    });
</script>
@endsection