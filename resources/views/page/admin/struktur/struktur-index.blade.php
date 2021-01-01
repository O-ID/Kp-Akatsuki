@extends('desain.menu')
@section('halaman', 'Validasi')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <h2 class="card-title">Struktur</h2>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table usertable">
                <thead class=" text-primary">
                    <td>Nama Jabatan</td>
                    <td>Nama Pejabat</td>
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
            processing: true,
            serverSide: true,
            ajax: "{{route('admin.struktur.dataTable')}}",
            columns: [
                { data: 'nama_jabatan'},
                { data: 'nama_pejabat'},
                { data: 'action'},
            ]
        });
    });
</script>
@endsection
