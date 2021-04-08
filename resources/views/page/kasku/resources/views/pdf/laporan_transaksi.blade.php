<!doctype html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet"> -->
    <style>
      @page { margin:0px; }
    </style>
    <style>
      /*html{
        font-family: 'Poppins', sans-serif;
      }*/

      .table-bordered td, th{
        border: 1px solid #000;
        padding: 0px 5px;
      }
      .col-1{
          width: 8.333%;
      }
      .col-2{
          width: 16.66%;
      }
      .col-3{
          width: 25%;
      }
      .col-4{
          width: 33.333%;
      }
      .col-5{
          width: 41.666%;
      }
      .col-6{
          width: 50%;
      }
      .col-7{
          width: 58.333%;
      }
      .col-8{
          width: 66.666%;
      }
      .col-9{
          width: 75%;
      }
      .col-10{
          width: 83.333%;
      }
      .col-11{
          width: 91.666%;
      }
      .col-12{
          width: 100%;
      }
      .text-center{
          text-align: center;
      }
      .text-right{
          text-align: right;
      }
      .text-uppercase{
          text-transform: uppercase;
      }
      .color-white{
          color: #fff;
      }
      .color-danger{
          color: #e60909;
      }
      .color-success{
          color: #12bf18;
      }
      .bg-color-primary{
        background-color: #4D7654;
      }
      p{
        font-size: 11px;
      }
    </style>
  </head>
  <body>

    <table class="col-12 text-center" style="border-collapse: collapse;">
      <tr>
        <td class="col-8 bg-color-primary">
          <h3 class="color-white text-uppercase">Laporan Transaksi {{ $bisnis->nama_bisnis }}</h3>
        </td>
      </tr>
    </table>

    <div style="margin: 20px">

      <table class="col-12">
        <tr>
          <td class="col-6">
            <p>Dibuat Pada: <b>20 Juli 2018</b></p>
            <p>Total Transaksi: <b>{{ count($transaksi) }}</b></p>
            
          </td>
          <td class="col-6">
            <p class="text-right">Total Pemasukan: <b class="color-success">Rp {{ number_format($pemasukan, null, null, '.') }}</b></p>
            <p class="text-right">Total Pengeluaran: <b class="color-danger">Rp {{ number_format($pengeluaran, null, null, '.') }}</b></p>
          </td>
        </tr>
      </table>

      <table style="border-collapse: collapse;" class="col-12 table-bordered">
        <thead>
          <tr>
            <th class="col-1"><p>NO</p></th>
            <th class="col-3"><p>TANGGAL</p></th>
            <th class="col-2"><p>JENIS TRANSAKSI</p></th>
            <th class="col-2"><p>JUMLAH</p></th>
            <th class="col-2"><p>PEMASUKAN</p></th>
            <th class="col-2"><p>PENGELUARAN</p></th>
          </tr>
        </thead>
        <tbody>
          @foreach ($transaksi as $item)
          <tr>
            <td class="text-center"><p>{{ $loop->index + 1 }}</p></td>
            <td class="text-center"><p>{{ $item->tanggal_transaksi }}</p></td>
            <td class="text-center"><p>{{ $item->nama_jenis_transaksi }}</p></td>
            <td class="text-center"><p>{{ $item->jumlah_item }} {{ $item->nama_satuan }}</p></td>
            <td class="text-right">
              @if ($item->kategori == "masuk")
                <p>Rp {{ number_format($item->nominal, null, null, '.') }}</p>
              @else
                <p>-</p>
              @endif
            </td>
            <td class="text-right">
              @if ($item->kategori == "keluar")
              <p>Rp {{ number_format($item->nominal, null, null, '.') }}</p>
              @else
                <p>-</p>
              @endif
            </td>
          </tr>  
          @endforeach
         
        </tbody>
      </table>
      
    </div>

    
  </body>
</html>