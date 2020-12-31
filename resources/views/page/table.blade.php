@extends('desain.menu')
@section('halaman', 'Daftar Kelulusan')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title ">Daftar Kelulusan Penerimaan Siswa Baru</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
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
                        <td class="text-warning">{{ $datas->status==0?'Menunggu Konfirmasi':'Lulus' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card card-plain">
        <div class="card-header card-header-primary">
            <h4 class="card-title mt-0"> Table on Plain Background</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-hover">
                <thead class="">
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    Country
                </th>
                <th>
                    City
                </th>
                <th>
                    Salary
                </th>
                </thead>
                <tbody>
                <tr>
                    <td>
                    1
                    </td>
                    <td>
                    Dakota Rice
                    </td>
                    <td>
                    Niger
                    </td>
                    <td>
                    Oud-Turnhout
                    </td>
                    <td>
                    $36,738
                    </td>
                </tr>
                <tr>
                    <td>
                    2
                    </td>
                    <td>
                    Minerva Hooper
                    </td>
                    <td>
                    Curaçao
                    </td>
                    <td>
                    Sinaai-Waas
                    </td>
                    <td>
                    $23,789
                    </td>
                </tr>
                <tr>
                    <td>
                    3
                    </td>
                    <td>
                    Sage Rodriguez
                    </td>
                    <td>
                    Netherlands
                    </td>
                    <td>
                    Baileux
                    </td>
                    <td>
                    $56,142
                    </td>
                </tr>
                <tr>
                    <td>
                    4
                    </td>
                    <td>
                    Philip Chaney
                    </td>
                    <td>
                    Korea, South
                    </td>
                    <td>
                    Overland Park
                    </td>
                    <td>
                    $38,735
                    </td>
                </tr>
                <tr>
                    <td>
                    5
                    </td>
                    <td>
                    Doris Greene
                    </td>
                    <td>
                    Malawi
                    </td>
                    <td>
                    Feldkirchen in Kärnten
                    </td>
                    <td>
                    $63,542
                    </td>
                </tr>
                <tr>
                    <td>
                    6
                    </td>
                    <td>
                    Mason Porter
                    </td>
                    <td>
                    Chile
                    </td>
                    <td>
                    Gloucester
                    </td>
                    <td>
                    $78,615
                    </td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
