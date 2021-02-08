@extends('desain.menu')
@section('halaman', 'Denah')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title">Denah</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table usertable">
                <thead class=" text-primary">
                    <td>Nama Tempat</td>
                    <td>Foto Tempat</td>
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
            ajax: "{{route('admin.denah.dataTable')}}",
            columns: [
                { data: 'nama_tempat'},
                { data: 'foto_tempat'},
                { data: 'action'},
            ]
        });
    });
</script>
@endsection
