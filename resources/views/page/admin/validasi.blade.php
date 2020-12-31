@extends('desain.menu')
@section('halaman', 'Validasi')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <h2 class="card-title ">Daftar Penerimaan Siswa Baru</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table usertable">
                <thead class=" text-primary">
                    <td>ID Registrasi</td>
                    <td>Nama Pendaftar</td>
                    <td>Jurusan</td>
                    <td>Tanggal Daftar</td>
                    <td>Status</td>
                    {{-- <th>No</th>
                    <th>ID Pendaftaran</th>
                    <th>Nama Pendaftar</th>
                    <th>Jurusan</th>
                    <th>Tanggal Registrasi</th>
                    <th>Status</th> --}}
                </thead>
                <tbody>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    {{-- @php $no=1; @endphp
                    @foreach($data as $datas)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $datas->id_registrasi }}</td>
                        <td>{{ $datas->nama_lengkap }}</td>
                        <td>{{ $datas->nama_jurusan }}</td>
                        <td>{{ $datas->tgl_registrasi }}</td>
                        <td class="text-warning">{{ $datas->status==0?'Menunggu Konfirmasi':'Lulus' }}</td>
                    </tr>
                    @endforeach --}}
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        $('.usertable').DataTable({
            processing: true,
            // serverSide: true,
            ajax: "{{route('get.basicdata')}}",
            columns: [
                { data: 'id_registrasi', name: 'id' },
                { data: 'nama_lengkap', name: 'nama' },
                { data: 'nama_jurusan', name: 'jurusan' },
                { data: 'tgl_registrasi', name: 'tanggal registrasi' },
                { data: 'status', name: 'status' },
            ]
        });
    });
</script>
@endsection
