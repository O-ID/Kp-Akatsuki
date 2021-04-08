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
                    <div class="d-flex flex-row-reverse">
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Print
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin.print.all') }}">Semua</a>
                                <a class="dropdown-item" href="{{ route('admin.print.kelulusan', ['id'=>1]) }}">Lulus</a>
                                <a class="dropdown-item" href="{{ route('admin.print.kelulusan', ['id'=>2]) }}">Tidak Lulus</a>
                                <a class="dropdown-item" href="{{ route('admin.print.pksprint', ['id'=>1]) }}">Terima PKS</a>
                                <a class="dropdown-item" href="{{ route('admin.print.pksprint', ['id'=>2]) }}">Tidak Terima PKS</a>
                            </div>
                        </div>
                        
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Export
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('admin.export.pendaftar') }}">Semua</a>
                                <a class="dropdown-item" href="{{ route('admin.export.pendaftar', ['status' => '1' ]) }}">Lulus</a>
                                <a class="dropdown-item" href="{{ route('admin.export.pendaftar', ['status' => '0' ]) }}">Tidak Lulus</a>
                            </div>
                        </div>
                    </div>
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
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.pendaftar.dataTable') }}",
                columns: [{
                        data: 'id_registrasi'
                    },
                    {
                        data: 'nama_lengkap'
                    },
                    {
                        data: 'nama_jurusan'
                    },
                    {
                        data: 'tgl_registrasi'
                    },
                    {
                        data: 'status'
                    },
                    {
                        data: 'action'
                    },
                ]
            });
        });

    </script>
@endsection
