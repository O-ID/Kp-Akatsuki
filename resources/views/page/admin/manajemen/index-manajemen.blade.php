@extends('desain.menu')
@section('halaman', 'Manajemen')
@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="forjkdaftar current card" id="card1">
            <div class="card-header card-header-primary">
                <h2 class="card-title">Tahun Pelajaran</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table usertable1">
                        <thead class=" text-primary">
                            <td>ID Tapel</td>
                            <td>Tahun Pelajaran</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col text-right">
                            <button class="btn btn-warning btn-sm" type="button" id="btambahtapel">Tambah Tahun Pelajaran</button>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="forjkdaftar card" id="card2">
            <form action="{{route('admin.tapel.store')}}" method="post" autocomplete="false">
                {{ csrf_field() }}
                <div class="card-header card-header-primary">
                    <h2 class="card-title">Tambah Tahun Pelajaran</h2>
                </div>
                <div class="card-body">
                    <div class="form-group bmd-form-group is-filled">
                        <label class="bmd-label-floating">Tahun Pertama</label>
                        <input type="text" class="form-control text-center datepickertapel" name="tapel_y1">
                    </div>
                    <div class="form-group bmd-form-group is-filled">
                        <label class="bmd-label-floating">Tahun Kedua</label>
                        <input type="text" class="form-control text-center datepickertapel" name="tapel_y2">
                    </div>
                </div>
                <div class="card-footer pb-3">
                    <div class="container">
                        <div class="row">
                            <div class="col text-right">
                                <button class="btn btn-danger btn-sm" type="button" id="tblbataltapel">Batal</button>
                                <button class="btn btn-warning btn-sm" type="submit">Simpan</button>
                            </div>
                          </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{-- card jangka daftar --}}
    <div class="col-md-6">
        <div class="card forjkdaftar current" id="card3">
            <div class="card-header card-header-primary">
                <h2 class="card-title">Jangka Daftar</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table usertable2">
                        <thead class=" text-primary">
                            <td>Tahun Pelajaran</td>
                            <td>Awal Pendaftaran</td>
                            <td>Akhir Pendaftaran</td>
                            <td>Status</td>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col text-right">
                            <button class="btn btn-warning btn-sm" id="btambahj">Tambah Jangka Daftar</button>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="forjkdaftar card" id="card4">
            <form action="{{route('admin.storejkdaftar')}}" method="post" autocomplete="false">
                {{ csrf_field() }}
                <div class="card-header card-header-primary">
                    <h2 class="card-title">Tambah Jangka Daftar</h2>
                </div>
                <div class="card-body">
                    <div class="form-group bmd-form-group is-filled">
                        <label class="bmd-label-floating">Dibuka Dari Tanggal</label>
                        <input type="text" class="form-control text-center datepicker" name="buka" required>
                    </div>
                    <div class="form-group bmd-form-group is-filled">
                        <label class="bmd-label-floating">Ditutp Pada Tanggal</label>
                        <input type="text" class="form-control text-center datepicker" name="tutup" required>
                    </div>
                    <label class="mr-sm-2" for="inlineFormCustomSelect">Tahun Pelajaran</label>
                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="tapeljangka" required>
                        <option selected value="">Pilih tahun Pelajaran</option>
                        @foreach ($dtapel as $item)
                            <option value="{{$item->id_tapel}}">{{$item->tapel}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="card-footer pb-3">
                    <div class="container">
                        <div class="row">
                            <div class="col text-right">
                                <button class="btn btn-danger btn-sm" type="button" id="tblbatal">Batal</button>
                                <button class="btn btn-warning btn-sm" type="submit">Simpan</button>
                            </div>
                          </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="forjkdaftar current card" id="card5">
            <div class="card-header card-header-primary">
                <h2 class="card-title">Jurusan</h2>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table usertable3">
                        <thead class=" text-primary">
                            <td>ID</td>
                            <td>Nama Jurusan</td>
                            <td>Aksi</td>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer pb-3">
                <div class="container">
                    <div class="row">
                        <div class="col text-right">
                            <button class="btn btn-warning btn-sm" type="button" id="tambahjurusan">Tambah Jurusan</button>
                        </div>
                      </div>
                </div>
            </div>
        </div>
        <div class="forjkdaftar card" id="card6">
            <form action="{{route('admin.jurusan.store')}}" method="post" autocomplete="false">
                {{ csrf_field() }}
                <div class="card-header card-header-primary">
                    <h2 class="card-title">Tambah Jurusan</h2>
                </div>
                <div class="card-body">
                    <div class="form-group bmd-form-group is-filled">
                        <label class="bmd-label-floating">Nama Jurusan</label>
                        <input type="text" class="form-control text-center" name="tnamajurusan" required>
                    </div>
                </div>
                <div class="card-footer pb-3">
                    <div class="container">
                        <div class="row">
                            <div class="col text-right">
                                <button class="btn btn-danger btn-sm" type="button" id="tblbataljurusan">Batal</button>
                                <button class="btn btn-warning btn-sm" type="submit">Simpan</button>
                            </div>
                          </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(function() {
        var da='{{date('Y-m-d')}}';
        $('.usertable1').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 5,
            lengthMenu: [5, 10],
            ajax: "{{route('admin.gettapel')}}",
            columns: [
                { data: 'id_tapel'},
                { data: 'tapel'},
                { data: 'statusconv'},
            ]
        });
        $('.usertable2').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 5,
            lengthMenu: [5, 10],
            ajax: "{{route('admin.getjkdaftar')}}",
            columns: [
                { data: 'tapel'},
                { data: 'mulai'},
                { data: 'selesai'},
                { data: 'status',
                    render: function(data, type, row){
                        if(row.selesai<da){
                            return 'Nonaktif';
                        }else{
                            return 'Aktif';
                        }
                    }
                },
            ]
        });
        $('.usertable3').DataTable({
            processing: true,
            serverSide: true,
            pageLength: 5,
            lengthMenu: [5, 10],
            ajax: "{{route('admin.getjurusan')}}",
            columns: [
                { data: 'id_jurusan'},
                { data: 'nama_jurusan'},
                { data: 'aksi'},
            ]
        });

        $('.datepicker').datepicker({
            format: "yyyy-mm-dd",
            language: "id",
            autoclose: true
        });
        $('.datepickertapel').datepicker({
            format: "yyyy",
            language: "id",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });
        $('.card .card-footer .container .row .col #btambahtapel').click(function(){
            $('.row .col-md-6 #card1').removeClass('ld ld-fade-out current');
            $('.row .col-md-6 #card2').addClass('ld ld-fade-in current');
        });
        $('.card .card-footer .container .row .col #tblbataltapel').click(function(){
            $('.row .col-md-6 #card2').removeClass('ld ld-fade-out current');
            $('.row .col-md-6 #card1').addClass('ld ld-fade-in current');
        });
        $('.card .card-footer .container .row .col #btambahj').click(function(){
            $('.row .col-md-6 #card3').removeClass('ld ld-fade-out current');
            $('.row .col-md-6 #card4').addClass('ld ld-fade-in current');
        });
        $('.card .card-footer .container .row .col #tblbatal').click(function(){
            $('.row .col-md-6 #card4').removeClass('ld ld-fade-out current');
            $('.row .col-md-6 #card3').addClass('ld ld-fade-in current');
        });
        $('.card .card-footer .container .row .col #tambahjurusan').click(function(){
            $('.row .col-md-12 #card5').removeClass('ld ld-fade-out current');
            $('.row .col-md-12 #card6').addClass('ld ld-fade-in current');
        });
        $('.card .card-footer .container .row .col #tblbataljurusan').click(function(){
            $('.row .col-md-12 #card6').removeClass('ld ld-fade-out current');
            $('.row .col-md-12 #card5').addClass('ld ld-fade-in current');
        });
    });
</script>
@endsection
