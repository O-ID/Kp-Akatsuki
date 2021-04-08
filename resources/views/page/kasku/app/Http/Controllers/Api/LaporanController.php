<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;
use App\Bisnis;
use App\Transformers\OwnerTransformer;
use PDF;
use Carbon\Carbon;

class LaporanController extends Controller
{
    public function transaksi($id_bisnis, Request $request)
    {
        $bisnis = Bisnis::find($id_bisnis);
        $data = Transaksi::where("transaksi.id_bisnis", "=", $id_bisnis)
            ->join("satuan", "satuan.id_satuan", "=", "transaksi.id_satuan")
            ->join("jenis_transaksi", "jenis_transaksi.id_jenis_transaksi", "=", "transaksi.id_jenis_transaksi");
        if($request->exists('rentang')){
            $param['rentang'] = $request->rentang;
            if ($request->rentang == "semua")
            {
                # code...
            }
            else if ($request->rentang == "bulanini") 
            {
                $data = $data->whereYear('tanggal_transaksi', Carbon::now()->year)
                            ->whereMonth('tanggal_transaksi', Carbon::now()->month);
            }
            else if ($request->rentang == "bulanlalu")
            {
                $data = $data->whereYear('tanggal_transaksi', Carbon::now()->subMonth()->month == 12 ? Carbon::now()->year - 1 : Carbon::now()->year)
                            ->whereMonth('tanggal_transaksi', Carbon::now()->subMonth()->month);
            }
            else if ($request->rentang == "mingguini")
            {
                $data = $data->whereBetween('tanggal_transaksi', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]);
            }
            else if ($request->rentang == "minggulalu")
            {
                $data = $data->whereBetween('tanggal_transaksi', [Carbon::now()->startOfWeek()->subDays(7), Carbon::now()->endOfWeek()->subDays(7)]);
            }
            else if ($request->rentang == "hariini")
            {
                $data = $data->whereDate('tanggal_transaksi', Carbon::now());
            }
        }
        $data_transaksi = $data->get();

        $total_transaksi = $data->sum("nominal");
        $pengeluaran = $data->where('kategori', '=', 'keluar')->sum("nominal");

        $param = [
            'transaksi' => $data_transaksi,
            'bisnis' => $bisnis,
            'pengeluaran' => (int) $pengeluaran,
            'pemasukan' => $total_transaksi - $pengeluaran,
        ];

        return PDF::loadView('pdf.laporan_transaksi', $param)->download('invoice.pdf');
        return view("pdf.laporan_transaksi", $param);
    }

    public function grafik($id_bisnis, Request $request)
    {
        return PDF::loadView('pdf.grafik_lingkaran')->download('grafik.pdf');
        return view("pdf.grafik_lingkaran");
    }
}
