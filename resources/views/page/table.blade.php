@extends('desain.menu')
@section('halaman', 'Daftar Kelulusan')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Daftar Kelulusan Penerimaan Siswa Baru</h4>
            <p></p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table">
                <thead class=" text-primary">
                    <th>No</th>
                    <th>ID Pendaftaran</th>
                    <th>Nama Pendaftar</th>
                    <th>Jurusan</th>
                    <th>Tanggal Registrasi</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->id_registrasi }}</td>
                        <td>{{ $datas->nama_lengkap }}</td>
                        <td>{{ $datas->nama_jurusan }}</td>
                        <td>{{ $datas->tgl_registrasi }}</td>
                        <td class="
                            @if( $datas->status == 0 )
                                text-default
                            @elseif($datas->status == 1)
                                text-primary
                            @else
                                text-warning
                            @endif
                        ">
                            @if( $datas->status == 0 )
                                Menunggu Konfirmasi
                            @elseif($datas->status == 1)
                                Lulus
                            @else
                                Gagal
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
