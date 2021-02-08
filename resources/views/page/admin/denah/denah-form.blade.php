@extends('desain.menu')
@section('halaman', 'Validasi')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary">
                <h2 class="card-title ">Denah Form</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.denah.put', $denah->id_denah) }}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_method" value="PUT">

                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="alamat">Nama Tempat</label>
                        <input type="text"  class="form-control" name="nama_tempat" 
                            @if( isset($denah) ) value="{{ $denah->nama_tempat }}" @else value="{{ old('nama_tempat') }}" @endif disabled>
                    </div>

                    <div class="col-md-3" style="padding: 0px !important">
                        <label for="alamat">Foto Tempat</label>
                        <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                          <div class="fileinput-new thumbnail">
                            @if ($denah->foto_tempat)
                                <img src="{{ asset('assets/img/denah/' . $denah->foto_tempat) }}" alt="...">
                            @else
                                <img src="{{ asset('assets/img/image_placeholder.jpg') }}" alt="...">
                            @endif
                          </div>
                          <div class="fileinput-preview fileinput-exists thumbnail"></div>
                          <div>
                            <span class="btn btn-warning btn-file">
                              <span class="fileinput-new">Pilih Gambar</span>
                              <span class="fileinput-exists">Ganti Gambar</span>
                              <input type="file" name="foto_tempat">
                            </span>
                            <a href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                          </div>
                        </div>
                      </div>

                    <div class="form-group float-right">
                        <a href="{{ route('admin.denah.index') }}" class="btn btn-md btn-danger">Kembali</a>
                        <button type="submit" class="btn btn-md btn-warning">Simpan</button>
                    </div>
                      
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
