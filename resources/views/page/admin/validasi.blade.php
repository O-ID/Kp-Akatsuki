@extends('desain.menu')
@section('halaman', 'Validasi')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Pendaftar</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table usertable">
                <thead class=" text-primary">
                    <td>ID Registasi</td>
                    <td>Nama Pendaftar</td>
                    <td>Jurusan</td>
                    <td>Tanggal Daftar</td>
                    <td>Status</td>
                    <td>Aksi</td>
                </thead>
                <tbody>
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
            dom: 'Bfrtip',
            buttons: [
                {extend: 'print', text: 'Print Semua', className: 'btn btn-outline-primary btn-sm'},
                {extend: 'print', text: 'Print Tidak Lulus', className: 'btn btn-outline-primary btn-sm'}
            ],
            processing: true,
            serverSide: true,
            ajax: "{{route('admin.pendaftar.dataTable')}}",
            columns: [
                { data: 'id_registrasi'},
                { data: 'nama_lengkap'},
                { data: 'nama_jurusan'},
                { data: 'tgl_registrasi'},
                { data: 'status'},
                { data: 'action'},
            ]
        });
    });
</script>
@endsection
