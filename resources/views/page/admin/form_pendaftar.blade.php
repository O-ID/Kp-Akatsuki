@extends('desain.menu')
@section('halaman', 'Edit Data Pendaftar')
@section('content')
    <div class="row ld ld-throw-btt-in">
        {{-- data pokok --}}
        <div class="card card-chart">
            <div class="card-header card-header-primary">
                <div class="text-center">
                    <h4 class="mt-0">DATA POKOK PENDAFTAR</h4>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post"
                    action="{{ route('admin.pendaftar.put.pokok', $edit->id_pendaftar) }}">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-3 col-form-label">Jurusan</label>
                                <div class="col-md-9">
                                    <div class="form-group bmd-form-group">
                                        <select name="id_jurusan" class="form-control">
                                            @foreach ($jurusan as $item)
                                                <option {{ $edit->id_jurusan == $item->id_jurusan ? 'selected' : '' }}
                                                    value="{{ $item->id_jurusan }}">{{ $item->nama_jurusan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Nama Lengkap</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="nama_lengkap"
                                            value="{{ $edit->nama_lengkap }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Alamat Asal</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="alamat_asal"
                                            value="{{ $edit->alamat_asal }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">RT</label>
                                <div class="col-md-3">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="rt"
                                            value="{{ explode('/', $edit->rt_rw)[0] }}" required>
                                    </div>
                                </div>
                                <label class="col-md-3 col-form-label">RW</label>
                                <div class="col-md-3">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="rw"
                                            value="{{ explode('/', $edit->rt_rw)[1] }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Dusun</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="dusun" value="{{ $edit->dusun }}"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Desa</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="desa" value="{{ $edit->desa }}"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Kecamatan</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="kecamatan"
                                            value="{{ $edit->kecamatan }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Kota</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="kota" value="{{ $edit->kota }}"
                                            required>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-3 col-form-label">Tempat Lahir</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="tmpt_lahir"
                                            value="{{ $edit->tmpt_lahir }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="date" class="form-control" name="tgl_lahir"
                                            value="{{ $edit->tgl_lahir }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-md-9">
                                    <div class="form-group bmd-form-group">
                                        <select name="jk" class="form-control">
                                            <option {{ $edit->id_jurusan == 'L' ? 'selected' : '' }} value="L">Laki-laki
                                            </option>
                                            <option {{ $edit->id_jurusan == 'P' ? 'selected' : '' }} value="P">Perempuan
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Agama</label>
                                <div class="col-md-9">
                                    <div class="form-group bmd-form-group">
                                        <select name="agama" class="form-control">
                                            <option {{ $edit->agama == 'Islam' ? 'selected' : '' }} value="Islam">Islam
                                            </option>
                                            <option {{ $edit->agama == 'Kristen' ? 'selected' : '' }} value="Kristen">
                                                Kristen</option>
                                            <option {{ $edit->agama == 'Katolik' ? 'selected' : '' }} value="Katolik">
                                                Katolik</option>
                                            <option {{ $edit->agama == 'Hindu' ? 'selected' : '' }} value="Hindu">Hindu
                                            </option>
                                            <option {{ $edit->agama == 'Buddha' ? 'selected' : '' }} value="Buddha">
                                                Buddha</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">No Telepon Rumah</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="number" class="form-control" name="no_telp_rumah"
                                            value="{{ $edit->no_telp_rumah }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">No HP</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="number" class="form-control" name="no_hp" value="{{ $edit->no_hp }}"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Email</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="email" value="{{ $edit->email }}"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-fill btn-rose pull-right">Simpan<div
                                    class="ripple-container"></div></button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="card-footer">

            </div>
        </div>
        {{-- data orang tua --}}
        <div class="card card-chart">
            <div class="card-header card-header-primary">
                <div class="text-center">
                    <h4 class="mt-0">DATA ORANG TUA PENDAFTAR</h4>
                </div>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="post"
                    action="{{ route('admin.pendaftar.put.ortu', $edit->id_pendaftar) }}">
                    <input type="hidden" name="_method" value="PUT">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-3 col-form-label">Nama Ayah</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="nama_ayah"
                                            value="{{ $edit->nama_ayah }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Pekerjaan Ayah</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="pekerjaan_ayah"
                                            value="{{ $edit->pekerjaan_ayah }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Kebutuhan Khusus Ayah</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="kebutuhan_khusus_ayah"
                                            value="{{ $edit->kebutuhan_khusus_ayah }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Pendidikan Ayah</label>
                                <div class="col-md-9">
                                    <div class="form-group bmd-form-group">
                                        <select name="pendidikan_ayah" class="form-control">
                                            <option {{ $edit->pendidikan_ayah == 'SD Sederajat' ? 'selected' : '' }}
                                                value="SD Sederajat">SD Sederajat
                                            </option>
                                            <option {{ $edit->pendidikan_ayah == 'SMP Sederajat' ? 'selected' : '' }}
                                                value="SMP Sederajat">
                                                SMP Sederajat</option>
                                            <option {{ $edit->pendidikan_ayah == 'SMA Sederajat' ? 'selected' : '' }}
                                                value="SMA Sederajat">
                                                SMA Sederajat</option>
                                            <option {{ $edit->pendidikan_ayah == 'S1' ? 'selected' : '' }} value="S1">S1
                                            </option>
                                            <option {{ $edit->pendidikan_ayah == 'S2' ? 'selected' : '' }} value="S2">
                                                S2</option>
                                            <option {{ $edit->pendidikan_ayah == 'S3' ? 'selected' : '' }} value="S3">
                                                S3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Penghasilan Ayah</label>
                                <div class="col-md-9">
                                    <div class="form-group bmd-form-group">
                                        <select name="penghasilan_ayah" class="form-control">
                                            <option {{ $edit->penghasilan_ayah == '< 1.000.000' ? 'selected' : '' }}
                                                value="< 1.000.000">
                                                < 1.000.000 </option>
                                            <option {{ $edit->penghasilan_ayah == '1 Juta - 2 Juta' ? 'selected' : '' }}
                                                value="1 Juta - 2 Juta">
                                                1 Juta - 2 Juta</option>
                                            <option {{ $edit->penghasilan_ayah == '2 Juta - 3 Juta' ? 'selected' : '' }}
                                                value="2 Juta - 3 Juta">
                                                2 Juta - 3 Juta</option>
                                            <option {{ $edit->penghasilan_ayah == '3 Juta - 4 Juta' ? 'selected' : '' }}
                                                value="3 Juta - 4 Juta">3 Juta - 4 Juta
                                            </option>
                                            <option {{ $edit->penghasilan_ayah == '4 Juta - 5 Juta' ? 'selected' : '' }}
                                                value="4 Juta - 5 Juta">
                                                4 Juta - 5 Juta</option>
                                            <option {{ $edit->penghasilan_ayah == '> 5.000.000' ? 'selected' : '' }}
                                                value="> 5.000.000">
                                                > 5.000.000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Tahun Lahir Ayah</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="thn_lahir_ayah"
                                            value="{{ $edit->thn_lahir_ayah }}" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <label class="col-md-3 col-form-label">Nama Ibu</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="nama_ibu"
                                            value="{{ $edit->nama_ibu }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Pekerjaan Ibu</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="pekerjaan_ibu"
                                            value="{{ $edit->pekerjaan_ibu }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Kebutuhan Khusus Ibu</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="kebutuhan_khusus_ibu"
                                            value="{{ $edit->kebutuhan_khusus_ibu }}" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Pendidikan Ibu</label>
                                <div class="col-md-9">
                                    <div class="form-group bmd-form-group">
                                        <select name="pendidikan_ibu" class="form-control">
                                            <option {{ $edit->pendidikan_ibu == 'SD Sederajat' ? 'selected' : '' }}
                                                value="SD Sederajat">SD Sederajat
                                            </option>
                                            <option {{ $edit->pendidikan_ibu == 'SMP Sederajat' ? 'selected' : '' }}
                                                value="SMP Sederajat">
                                                SMP Sederajat</option>
                                            <option {{ $edit->pendidikan_ibu == 'SMA Sederajat' ? 'selected' : '' }}
                                                value="SMA Sederajat">
                                                SMA Sederajat</option>
                                            <option {{ $edit->pendidikan_ibu == 'S1' ? 'selected' : '' }} value="S1">S1
                                            </option>
                                            <option {{ $edit->pendidikan_ibu == 'S2' ? 'selected' : '' }} value="S2">
                                                S2</option>
                                            <option {{ $edit->pendidikan_ibu == 'S3' ? 'selected' : '' }} value="S3">
                                                S3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Penghasilan Ibu</label>
                                <div class="col-md-9">
                                    <div class="form-group bmd-form-group">
                                        <select name="penghasilan_ibu" class="form-control">
                                            <option {{ $edit->penghasilan_ibu == '< 1.000.000' ? 'selected' : '' }}
                                                value="< 1.000.000">
                                                < 1.000.000 </option>
                                            <option {{ $edit->penghasilan_ibu == '1 Juta - 2 Juta' ? 'selected' : '' }}
                                                value="1 Juta - 2 Juta">
                                                1 Juta - 2 Juta</option>
                                            <option {{ $edit->penghasilan_ibu == '2 Juta - 3 Juta' ? 'selected' : '' }}
                                                value="2 Juta - 3 Juta">
                                                2 Juta - 3 Juta</option>
                                            <option {{ $edit->penghasilan_ibu == '3 Juta - 4 Juta' ? 'selected' : '' }}
                                                value="3 Juta - 4 Juta">3 Juta - 4 Juta
                                            </option>
                                            <option {{ $edit->penghasilan_ibu == '4 Juta - 5 Juta' ? 'selected' : '' }}
                                                value="4 Juta - 5 Juta">
                                                4 Juta - 5 Juta</option>
                                            <option {{ $edit->penghasilan_ibu == '> 5.000.000' ? 'selected' : '' }}
                                                value="> 5.000.000">
                                                > 5.000.000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-md-3 col-form-label">Tahun Lahir Ibu</label>
                                <div class="col-md-9">
                                    <div class="form-group has-default bmd-form-group">
                                        <input type="text" class="form-control" name="thn_lahir_ibu"
                                            value="{{ $edit->thn_lahir_ibu }}" required>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-fill btn-rose pull-right">Simpan<div
                                    class="ripple-container"></div></button>
                        </div>
                    </div>
                </form>

            </div>
            <div class="card-footer">

            </div>
        </div>
    </div>
@endsection
