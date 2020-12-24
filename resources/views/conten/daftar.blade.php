@extends('desain.menu')
@section('halaman', 'Pendaftaran')
@section('content')
<section>
    <div class="row ld ld-throw-btt-in">
        <div class="card card-chart">
            <div class="card-header card-header-primary">
                <div class="text-center">
                    <h2 class="mb-0 font-weight-bold">Penerimaan Siswa Baru</h2>
                    <h4 class="mt-0">SMK Matsaratul Huda</h4>
                </div>
            </div>
            <div class="card-body">
                <form class="contak-form" method="post" action="{{ route ('form.formSubmit') }}" autocomplete="false" data-parsley-validate>
                    @csrf
                    <!-- <div class="form-section">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="bmd-label-floating">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" required autofocus>
                                <div class="row pt-4">
                                    <div class="col-sm-8">
                                        <label class="bmd-label-floating">Alamat Tempat Tinggal</label>
                                        <input type="text" class="form-control" name='alamat' required>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <label class="bmd-label-floating">RT</label>
                                                <input type="text" class="form-control" name="rt">
                                            </div>
                                            <div class="col-sm-6">
                                                <label class="bmd-label-floating">RW</label>
                                                <input type="text" class="form-control" name="rw">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-sm-6">
                                        <label class="bmd-label-floating">Dusun</label>
                                        <input type="text" class="form-control" name="dusun" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="bmd-label-floating">Kelurahan / Desa</label>
                                        <input type="text" class="form-control" name="kelurahan" required>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-sm-6">
                                        <label class="bmd-label-floating">Kecamatan</label>
                                        <input type="text" class="form-control" name="kecamatan" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="bmd-label-floating">Kabupaten / Kota</label>
                                        <input type="text" class="form-control" name="kabupaten" required>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-sm-8">
                                        <label class="bmd-label-floating">Provinsi</label>
                                        <input type="text" class="form-control" name="provinsi" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="bmd-label-floating">Kode Pos</label>
                                        <input type="number" data-parsley-type="integer" maxlength="5" minlength="5" name="postal" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="bmd-label-floating">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmptlahirsiswa" required>
                                <div class="row pt-4">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating">Tanggal Lahir</label>
                                        <input readonly class="form-control-plaintext text-light vlDate" name="tglLahir" type="text" placeholder="mm/dd/yyyy" required>
                                        <div class="dateSis"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label class="bmd-label-floating">Jenis Kelamin</label>
                                <input class="form-control d-none" type="text" name="forjk" id="forjk" required>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm btn-block dropdown-toggle" type="button" name="Jksiswa" value="" id="dropdownMenuButtonjk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" required>
                                        Pilih Jenis Kelamin
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonjk">
                                        <option class="dropdown-item jk" value="L">Laki-Laki</option>
                                        <option class="dropdown-item jk" value="P">Perempuan</option>
                                        <option class="dropdown-item jk" value="D">Lainnya</option>
                                    </div>
                                </div>
                                <div class="row pt-3">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating">Agama</label>
                                        <input class="form-control d-none" type="text" name="foragama" id="foragama" required>
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm btn-block dropdown-toggle" type="button" name="agama" value="" id="dropdownMenuButtonag" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" required>
                                                Pilih Agama
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonag">
                                                <option class="dropdown-item ag" value="islam">Islam</option>
                                                <option class="dropdown-item ag" value="kristen">Kristen</option>
                                                <option class="dropdown-item ag" value="katolik">Katolik</option>
                                                <option class="dropdown-item ag" value="Hindu">Hindu</option>
                                                <option class="dropdown-item ag" value="buddha">Buddha</option>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating">Transportasi/Kendaraan</label>
                                        <input class="form-control d-none" type="text" name="forkendaraan" id="forkendaraan" required>
                                        <div class="dropdown">
                                            <button class="btn btn-primary btn-sm btn-block dropdown-toggle" type="button" name="agama" value="" id="dropdownMenuButtonkd" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" required>
                                                Pilih Pilihan
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonkd">
                                                <option class="dropdown-item kd" value="Kendaraan Umum">Kendaraan Umum</option>
                                                <option class="dropdown-item kd" value="Sepeda Motor">Sepeda Motor</option>
                                                <option class="dropdown-item kd" value="Jalan Kaki">Jalan Kaki</option>
                                                <option class="dropdown-item kd" value="Mobil">Mobil</option>
                                                <option class="dropdown-item kd" value="Lainnya">Lainnya</option>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating pt-4">No. Telpon Rumah</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating pt-4">No.Hp</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label class="bmd-label-floating">Jenis Tinggal</label>
                                <input type="text" class="form-control" required>
                                <div class="row pt-4">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating">Email</label>
                                        {{-- @error('email') has-danger @enderror --}}
                                        <input type="email" data-parsley-type="email" class="form-control" name="email" required autofocus>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating">NIK KTP</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <div class="row">
                            <div class="col-sm-4">
                                <label class="bmd-label-floating">NISN</label>
                                <input class="form-control" type="number" placeholder="*Diisikan Data Dari Jenjang Sebelumnya" name="nisn" required autofocus>
                                <div class="row pt-4">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating">NIS</label>
                                        <input class="form-control" type="number" placeholder="*Diisikan Data Dari Jenjang Sebelumnya" name="nis" required autofocus>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="bmd-label-floating">No. Ujian Nasional</label>
                                <input class="form-control" type="number" placeholder="*Diisikan Data Dari Jenjang Sebelumnya" name="nunasional">
                                <div class="row pt-4">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating">NOMOR SERI IJAZAH</label>
                                        <input class="form-control" type="number" placeholder="*Diisikan Data Dari Jenjang Sebelumnya" name="noseriijasah">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label class="bmd-label-floating">NPSN Sekolah Asal</label>
                                <input class="form-control" type="text" name="npsn" placeholder="*Diisikan Data Dari Jenjang Sebelumnya" required autofocus>
                                <div class="row pt-4">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating">Nama Sekolah Asal</label>
                                        <input class="form-control" type="text" placeholder="*Diisikan Data Dari Jenjang Sebelumnya" name="namasekolah" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <div class="dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Menerima PKS?
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="JavaScript:void(0);">Ya</a>
                                <a class="dropdown-item" href="JavaScript:void(0);">Tidak</a>
                            </div>
                        </div>
                        <div class="kps forkps">
                            <div class="row">
                                <div class="col-sm-3">
                                    <label class="bmd-label-floating">No. KKS</label>
                                    <input type="text" class="form-control" name="nokks" required>
                                </div>
                                <div class="col-sm-3">
                                    <label class="bmd-label-floating">NO. KPS/PKH</label>
                                    <input type="text" class="form-control" name="kps" required>
                                </div>
                                <div class="col-sm-3">
                                    <label class="bmd-label-floating">Alasan Layak</label>
                                    <input type="text" class="form-control" name="alasanlayak" placeholder="Alasan Layak Diisi Jika Ada Di Sini">
                                </div>
                                <div class="col-sm-3">
                                    <label class="bmd-label-floating">No. KIP</label>
                                    <input type="text" class="form-control" name="alasanlayak" placeholder="No. KIP Diisi Jika Ada Di Sini">
                                </div>
                            </div>
                            <div class="row pt-4">
                                <div class="col-sm-3">
                                    <label class="bmd-label-floating">Nama Tertera di KIP</label>
                                    <input type="text" class="form-control" name="namakip" required>
                                </div>
                                <div class="col-sm-3">
                                    <label class="bmd-label-floating">Alasan Menolak KIP</label>
                                    <input type="text" class="form-control" name="tolakkip">
                                </div>
                                <div class="col-sm-3">
                                    <label class="bmd-label-floating">No Registrasi Akta Lahir</label>
                                    <input type="text" class="form-control" name="aktalahir" required>
                                </div>
                                <div class="col-sm-3"></div>
                            </div>
                            <div class="row pt-4">
                                <div class="col-sm-3">
                                    <label class="bmd-label-floating">Lintang</label>
                                    <input type="text" class="form-control" name="lintang" placeholder="Contoh: -7.200049000000" required>
                                </div>
                                <div class="col-sm-3">
                                    <label class="bmd-label-floating">Bujur</label>
                                    <input type="text" class="form-control" name="Bujur" placeholder="Contoh: 113.396160000000" required>
                                </div>
                                <div class="col-sm-3"></div>
                                <div class="col-sm-3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-section">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label class="bmd-label-floating">Nama Ayah</label>
                                        <input type="text" class="form-control" name="namaayah" required autofocus>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="bmd-label-floating">Tahun Lahir Ayah</label>
                                        <input type="number" data-parsley-type="integer" maxlength="4" minlength="4" name="thnayah" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating">Berkebutuhan Khusus</label>
                                        <input type="text" class="form-control" name="Kebutuhankhusus" required >
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-sm-4">
                                        <label class="bmd-label-floating">Pekerjaan Ayah</label>
                                        <input type="text" class="form-control" name="pekerjaanayah" required >
                                    </div>
                                    <div class="col-sm-4">
                                    <input class="form-control d-none" type="text" name="forpendayah" id="forpendayah" required>
                                        <div class="d-block btn-group" id="pendayah">
                                            <button type="button" class="btn btn-warning dropdown-toggle btn-block" name="pendidikanayah" value="" id="dropdownpendidikanayah" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Pendidikan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="JavaScript:void(0);">SD Sederajat</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">SMP Sederajat</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">SMA Sederajat</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">S1</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">S2</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">S3</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="d-block btn-group" id="penghayah">
                                        <input class="form-control d-none" type="text" name="forpenghayah" id="forpenghayah" required>
                                            <button type="button" class="btn btn-warning dropdown-toggle btn-block" name="penghasilanayah" value="" id="dropdownpenghasilanayah" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Penghasilan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="JavaScript:void(0);"> < 1.000.000 </a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">1 Juta - 2 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">2 Juta - 3 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">3 Juta - 4 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">4 Juta - 5 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);"> > 5.000.000</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label class="bmd-label-floating">Nama Ibu</label>
                                        <input type="text" class="form-control" name="namaibu" required >
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="bmd-label-floating">Tahun Lahir Ibu</label>
                                        <input type="number" data-parsley-type="integer" maxlength="4" minlength="4" name="thnibu" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-sm-12">
                                        <label class="bmd-label-floating">Berkebutuhan Khusus</label>
                                        <input type="text" class="form-control" name="Kebutuhankhusus" required >
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-sm-4">
                                        <label class="bmd-label-floating">Pekerjaan Ibu</label>
                                        <input type="text" class="form-control" name="pekerjaanibu" required >
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="d-block btn-group" id="pendibu">
                                        <input class="form-control d-none" type="text" name="forpendibu" id="forpendibu" required>
                                            <button type="button" class="btn btn-warning dropdown-toggle btn-block" name="pendidikanibu" value="" id="dropdownpendidikanibu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Pendidikan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="JavaScript:void(0);">SD Sederajat</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">SMP Sederajat</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">SMA Sederajat</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">S1</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">S2</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">S3</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="d-block btn-group" id="penghibu">
                                        <input class="form-control d-none" type="text" name="forpenghibu" id="forpenghibu" required>
                                            <button type="button" class="btn btn-warning dropdown-toggle btn-block" name="penghasilanibu" value="" id="dropdownpenghasilanibu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Penghasilan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="JavaScript:void(0);"> < 1.000.000 </a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">1 Juta - 2 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">2 Juta - 3 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">3 Juta - 4 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">4 Juta - 5 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);"> > 5.000.000</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row pt-4">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <h3 class="text-center">Wali</h3>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <label class="bmd-label-floating">Nama Wali</label>
                                        <input type="text" class="form-control" name="namawali" required autofocus>
                                    </div>
                                    <div class="col-sm-4">
                                        <label class="bmd-label-floating">Tahun Lahir Wali</label>
                                        <input type="number" data-parsley-type="integer" maxlength="4" minlength="4" name="thnwali" class="form-control" required>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-sm-4">
                                        <label class="bmd-label-floating">Pekerjaan Wali</label>
                                        <input type="text" class="form-control" name="pekerjaanwali" required >
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="d-block btn-group" id="pendwali">
                                        <input class="form-control d-none" type="text" name="forpendwali" id="forpendwali" required>
                                            <button type="button" class="btn btn-warning dropdown-toggle btn-block" name="pendidikanwali" value="" id="dropdownpendidikanwali" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Pendidikan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="JavaScript:void(0);">SD Sederajat</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">SMP Sederajat</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">SMA Sederajat</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">S1</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">S2</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">S3</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="d-block btn-group" id="penghwali">
                                        <input class="form-control d-none" type="text" name="forpenghwali" id="forpenghwali" required>
                                            <button type="button" class="btn btn-warning dropdown-toggle btn-block" name="penghasilanwali" value="" id="dropdownpenghasilanwali" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Penghasilan
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="JavaScript:void(0);"> < 1.000.000 </a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">1 Juta - 2 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">2 Juta - 3 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">3 Juta - 4 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);">4 Juta - 5 Juta</a>
                                                <a class="dropdown-item" href="JavaScript:void(0);"> > 5.000.000</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3"></div>
                        </div>
                    </div> -->
                    <div class="form-section">
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label class="bmd-label-floating">Tinggi Badan Peserta Didik</label>
                                        <input type="number" class="form-control" name="tbpesertadidik" placeholder="Contoh: 128" autofocus><h6>Centimeter</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="bmd-label-floating">Berat Badan</label>
                                        <input type="number" class="form-control" name="beratbadan" placeholder="Contoh: 60">
                                        <h6>Kilogram</h6>
                                    </div>
                                </div>
                                <div class="row pt-4">
                                    <div class="col-sm-6">
                                        <label class="bmd-label-floating">Jarak Tempat Tinggal Kesekolah</label>
                                        <input type="number" class="form-control" name="jarakrumahsiswa" placeholder="Contoh: 8"><h6>Kilometer</h6>
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="bmd-label-floating">Waktu Tempuh Ke Sekolah</label>
                                        <input type="number" class="form-control" name="wtks" placeholder="Contoh: 30">
                                        <h6>Menit</h6>
                                    </div>
                                </div>
                                <label class="bmd-label-floating pt-4">Jumlah Saudara Kandung</label>
                                <input type="number" class="form-control" name="sodara" placeholder="Contoh: 2">
                            </div>
                            <div class="col-sm-3"></div>
                            <input class="form-control d-none" type="text" name="forjk" id="forjk" required>
                                <div class="dropdown">
                                    <button class="btn btn-primary btn-sm btn-block dropdown-toggle" type="button" name="Jksiswa" value="" id="dropdownMenuButtonjk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" required>
                                        Pilih Jenis Kelamin
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonjk">
                                        <option class="dropdown-item jk" value="L">Laki-Laki</option>
                                        <option class="dropdown-item jk" value="P">Perempuan</option>
                                        <option class="dropdown-item jk" value="D">Lainnya</option>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="navnav">
                        <button type="button" class="btn btn-secondary pull-right nekt">Selanjutnya</button>
                        <button type="button" class="btn btn-danger pull-left preve">Sebelumnya</button>
                        <button type="submit" class="btn btn-success pull-right simpan">Simpan</button>
                        <div class="clearfix"></div>
                    </div>
                </form>   
            </div>
            <div class="card-footer">
                <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function(){
    $('.dropdown .dropdown-menu a').click(function(){
       if ( $(this).text()=='Ya') {
            $('.form-section .kps').addClass('current');
            $('.kps input').attr('required', 'true');
            // console.log($(this).text());
       }else{
           $('.kps input').removeAttr('required');
           $('.form-section .kps').removeClass('current');
       } 
    });
    $('#pendayah .dropdown-menu a').click(function(){
        $('#pendayah button').text($(this).text()).val($(this).text());
    });
    $('#penghayah .dropdown-menu a').click(function(){
        $('#penghayah button').text($(this).text()).val($(this).text());
    });
    $('#pendibu .dropdown-menu a').click(function(){
        $('#pendibu button').text($(this).text()).val($(this).text());
    });
    $('#penghibu .dropdown-menu a').click(function(){
        $('#penghibu button').text($(this).text()).val($(this).text());
    });
    $('#pendwali .dropdown-menu a').click(function(){
        $('#pendwali button').text($(this).text()).val($(this).text());
    });
    $('#penghwali .dropdown-menu a').click(function(){
        $('#penghwali button').text($(this).text()).val($(this).text());
    });
});
</script>
</section>
@endsection