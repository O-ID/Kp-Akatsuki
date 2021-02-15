<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/material-dashboard-pro.min.css?v=2.1.0') }}" />
    <title>Print &mdash;Pendaftaran Siswa Baru</title>
</head>
<body class="d-none d-print-block" onload="window.print()">
    <div class="container">
        <div class="d-flex justify-content-center"><h3>Laporan {{ $head }} Pendaftaran Siswa Baru</h3></div>
        <div class="d-flex justify-content-center"><h2>SMK ISLAM TANJUNG</h2></div>
        <div class="pt-4">
            <table class="table">
                <thead>
                    <th scope="col">No</th>
                    <th scope="col">ID</th>
                    <th scope="col">Nama Pendaftar</th>
                    <th scope="col">Tanggal Lahir</th>
                    <th scope="col">Jurusan</th>
                    <th scope="col">Tanggal Daftar</th>
                    <th scope="col">Keterangan</th>
                </thead>
                <tbody>
                    @php $no=1; @endphp
                    @foreach($data as $datas)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $datas->id_registrasi }}</td>
                            <td>{{ $datas->nama_lengkap }}</td>
                            <td>{{ $datas->tmpt_lahir }}, {{ $datas->tgl_lahir }}</td>
                            <td>{{ $datas->nama_jurusan }}</td>
                            <td>{{ $datas->tgl_registrasi }}</td>
                            <td>
                                @if ($datas->status == 1)
                                    Lulus
                                @elseif ($datas->status == 2)
                                    Tidak Lulus
                                @else
                                    Menunggu Konfirmasi
                                @endif
                            </td>
                        </tr>
                        @php $no++; @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        window.onafterprint = function(e){
            closePrintView();
        };
        function closePrintView() {
            window.location.href = "{{ route('admin.pendaftar.index') }}";
        }
    </script>
</body>
</html>
