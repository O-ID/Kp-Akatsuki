@extends('desain.menu')
@section('halaman', 'Validasi')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h2 class="card-title ">Struktur Form</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.struktur.put', $struktur->id_struktur) }}" method="post">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="alamat">Jabatan</label>
                        <input type="text"  class="form-control" name="nama_jabatan" 
                            @if( isset($struktur) ) value="{{ $struktur->nama_jabatan }}" @else value="{{ old('nama_jabatan') }}" @endif disabled>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Nama Pejabat</label >
                        <input type="text"  class="form-control" name="nama_pejabat" 
                            @if( isset($struktur) ) value="{{ $struktur->nama_pejabat }}" @else value="{{ old('nama_pejabat') }}" @endif required>
                    </div>
                    <div class="form-group float-right">
                        <a href="{{ route('admin.struktur.index') }}" class="btn btn-md btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-md btn-warning">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
