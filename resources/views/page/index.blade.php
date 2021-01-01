@extends('desain.menu')
@section('halaman', 'Beranda')
@section('content')
<div class="row ld ld-throw-btt-in">
        <div class="card card-chart">
            <div class="card-header card-header-primary">
                <div class="text-center">
                    <h2 class="mb-0 font-weight-bold">
                        @if (Session::has('LoginAdmin'))
                            Halaman Admin Penerimaan Siswa Baru
                        @else
                            Penerimaan Siswa Baru
                        @endif
                    </h2>
                    <h4 class="mt-0">SMK Matsaratul Huda</h4>
                    <img src="/assets/img/favicon.png" alt="" width="150px">
                </div>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            @if (Session::has('LoginAdmin'))
                                <h5 class="card-title">Halaman Ini Hanya Untuk Admin Penerimaan Siswa Baru</h5>
                            @else
                                <h5 class="card-title">Untuk Melakukan Pendaftaran Klik Tombol Pendaftaran Dibawah</h5>
                                <a href="{{url('/daftar')}}" class="btn btn-warning pull-center">Daftar Sekarang</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="container">
                    <div class="row">
                        <div class="col text-right">
                            @foreach ($data as $datas)
                                <h6 class="text-danger font-weight-bold">*Pendaftaran Dimulai Tanggal {{ $datas->mulai }} Sampai Tanggal {{ $datas->selesai }}</h6>
                            @endforeach
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
            md.showNotification("top","left","primary","{{ session('status') }}");
        @endif
        @if(session('errorr'))
            md.showNotification("top","left","danger","{{ session('errorr') }}");
        @endif
    });
</script>
@endsection
