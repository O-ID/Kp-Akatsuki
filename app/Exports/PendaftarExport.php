<?php
 
namespace App\Exports;
 
use App\modPendaftar;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use DB;

 
class PendaftarExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    public function __construct(int $status = null)
    {
        $this->status = $status;
    }

    public function collection()
    {
        $data =  modPendaftar::select([
                'registrasi.id_registrasi', 
                'pendaftar.nama_lengkap', 
                'jurusan.nama_jurusan', 
                'pendaftar.jk', 
                'pendaftar.nisn', 
                'pendaftar.tmpt_lahir', 
                'pendaftar.tgl_lahir', 
                'pendaftar.agama', DB::raw("CASE WHEN status = 0 then 'TIDAK LULUS' WHEN status = 1 then 'LULUS' ELSE 'BARU' END AS keterangan")
            ])
            ->join('registrasi', 'registrasi.id_pendaftar', '=', 'pendaftar.id_pendaftar')
            ->join('jurusan', 'jurusan.id_jurusan', '=', 'pendaftar.id_jurusan');
        if(isset($this->status))
        {
            $data = $data->where('registrasi.status', '=', $this->status);
        }
        return $data->get();
    }
    public function headings(): array
    {
        return [
            'ID REGISTRASI', 'NAMA LENGKAP', 'JURUSAN', 'JK', 'NISN', 'TEMPAT LAHIR', 'TANGGAL LAHIR', 'AGAMA', 'STATUS'
        ];
    }
}