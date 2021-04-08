<?php

namespace App\Transformers;

use App\Transaksi;
use League\Fractal\TransformerAbstract;
use App\JenisTransaksi;
use App\Transformers\JenisTransaksiTransformer;
use App\Satuan;
use App\Transformers\SatuanTransformer;
use App\Akuntan;
use App\Transformers\AkuntanTransformer;

class TransaksiTransformer extends TransformerAbstract
{
    protected $availableIncludes = ['jenisTransaksi', 'satuan', 'akuntan'];

    public function transform(Transaksi $model)
    {
        return [
            'id_transaksi' => $model->id_transaksi,
            'id_akuntan' => $model->id_akuntan,
            'id_jenis_transaksi' => $model->id_jenis_transaksi,
            'id_satuan' => $model->id_satuan,
            'kategori' => $model->kategori,
            'keterangan_transaksi' => $model->keterangan_transaksi,
            'tanggal_transaksi' => $model->tanggal_transaksi,
            'metode_pembayaran' => $model->metode_pembayaran,
            'jumlah_item' => $model->jumlah_item,
            'nominal' => $model->nominal,
        ];
    }

    public function includeJenisTransaksi(Transaksi $model)
    {
        $data = JenisTransaksi::find($model->id_jenis_transaksi);
        return $this->item($data, new JenisTransaksiTransformer);
    }

    public function includeSatuan(Transaksi $model)
    {
        $data = Satuan::find($model->id_satuan);
        return $this->item($data, new SatuanTransformer);
    }

    public function includeAkuntan(Transaksi $model)
    {
        $data = Akuntan::find($model->id_akuntan);
        return $this->item($data, new AkuntanTransformer);
    }
}