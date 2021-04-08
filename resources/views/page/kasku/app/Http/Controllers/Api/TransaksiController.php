<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Transaksi;
use Auth;
use App\Transformers\TransaksiTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use Carbon\Carbon;

class TransaksiController extends Controller
{    
    public function get(Request $request)
    {
        $limit = 10;
        $param = [];
        $param['limit'] = $limit;
        $data = new  Transaksi();
        if($request->exists('id_transaksi')){
            $data = $data->where('transaksi.id_transaksi', '=', $request->id_transaksi);
            $param['id_transaksi'] = $request->id_transaksi;
        }
        if($request->exists('id_bisnis')){
            $data = $data->where('transaksi.id_bisnis', '=', $request->id_bisnis);
            $param['id_bisnis'] = $request->id_bisnis;
        }
        if($request->exists('search')){
            if($request->cari != "")
            {
                $data = $data->where('transaksi.nominal', 'LIKE', '%' . $request->search . '%')
                    ->orWhere('transaksi.keterangan_transaksi', 'LIKE', '%' . $request->search . '%');
                $param['search'] = $request->search;
            }
        }
        if($request->exists('id_bisnis')){
            $data = $data->where('transaksi.id_bisnis', '=', $request->id_bisnis);
            $param['id_bisnis'] = $request->id_bisnis;
        }
        if($request->exists('limit')){
            $limit = $request->limit;
            $param['limit'] = $request->limit;
        }
        if($request->exists('sort')){
            $data = $data->orderBy('transaksi.id_transaksi', $request->sort == 'terlama' ? 'asc' : 'desc');
        }
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
        $data_transaksi = $data->paginate($limit)
                ->appends($param);

        $total_transaksi = $data->sum("nominal");

        $pengeluaran = $data->where('kategori', '=', 'keluar')->sum("nominal");
        return fractal()
            ->collection($data_transaksi)
            ->transformWith(new TransaksiTransformer)
			->includeJenisTransaksi()
			->includeSatuan()
			->includeAkuntan()
            ->paginateWith(new IlluminatePaginatorAdapter($data_transaksi))
            ->addMeta([
                'transaksi' => (int) $total_transaksi,
                'pengeluaran' => (int) $pengeluaran,
                'pemasukan' => $total_transaksi - $pengeluaran,
            ])
            ->toArray();
    }

    public function total(Request $request)
    {
        $data = new Transaksi();
        if($request->exists('rentang'))
        {
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
                // dd( Carbon::now()->format('Y-m-d'));
                $data = $data->whereDate('tanggal_transaksi', Carbon::now());
            }
        }
        $total_transaksi = $data->sum("nominal");
        $pengeluaran = $data->where('kategori', '=', 'keluar')->sum("nominal");
        $pemasukan = $total_transaksi - $pengeluaran;
        return response()->json([
            'data' => [
                'transaksi' => (int) $total_transaksi,
                'pengeluaran' => (int) $pengeluaran,
                'pemasukan' => $pemasukan,
                'keuntungan' => $pemasukan - $pengeluaran,
            ]
        ], 200);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'id_jenis_transaksi' => 'required|exists:jenis_transaksi,id_jenis_transaksi',
            'id_satuan' => 'required|exists:satuan,id_satuan',
            'id_bisnis' => 'required|exists:bisnis,id_bisnis',
            'kategori' => 'required|in:masuk,keluar',
            'tanggal_transaksi' => 'required|date_format:Y-m-d',
            'jumlah_item' => 'required|numeric',
            'nominal' => 'required|numeric',
        ]);
        Transaksi::create([
            'id_akuntan' => Auth::guard('api-akuntan')->id(),
            'id_jenis_transaksi' => $request->id_jenis_transaksi,
            'id_satuan' => $request->id_satuan,
            'id_bisnis' => $request->id_bisnis,
            'kategori' => $request->kategori,
            'keterangan_transaksi' => $request->keterangan_transaksi,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'jumlah_item' => $request->jumlah_item,
            'nominal' => $request->nominal,
            'metode_pembayaran' => $request->metode_pembayaran,
        ]);
        return response()->json(['message' => 'created'], 201);
    }

    public function put(Request $request, $id)
    {
        $this->validate($request, [
            'id_jenis_transaksi' => $request->exists('id_jenis_transaksi') ? 'required|exists:jenis_transaksi,id_jenis_transaksi' : '',
            'id_satuan' => $request->exists('id_satuan') ? 'required|exists:satuan,id_satuan' : '',
            'kategori' => $request->exists('kategori') ? 'required|in:masuk,keluar' : '',
            'tanggal_transaksi' => $request->exists('tanggal_transaksi') ? 'required|date_format:Y-m-d' : '',
            'jumlah_item' => $request->exists('jumlah_item') ? 'required|numeric' : '',
        ]);
        $data = Transaksi::find($id);
        $data->id_jenis_transaksi = $request->get('id_jenis_transaksi', $data->id_jenis_transaksi);
        $data->id_satuan = $request->get('id_satuan', $data->id_satuan);
        $data->kategori = $request->get('kategori', $data->kategori);
        $data->keterangan_transaksi = $request->get('keterangan_transaksi', $data->keterangan_transaksi);
        $data->tanggal_transaksi = $request->get('tanggal_transaksi', $data->tanggal_transaksi);
        $data->jumlah_item = $request->get('jumlah_item', $data->jumlah_item);
        $data->metode_pembayaran = $request->get('metode_pembayaran', $data->metode_pembayaran);
        $data->save();
        return response()->json(['message' => 'updated'], 200);
    }

    public function delete($id)
    {
        $data = Transaksi::find($id);
        $data->delete();
        return response()->json(['message' => 'deleted'],200);
    }
}