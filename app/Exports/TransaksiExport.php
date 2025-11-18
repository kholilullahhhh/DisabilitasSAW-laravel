<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TransaksiExport implements FromCollection, WithHeadings, WithStyles, WithColumnWidths, WithMapping
{

    public function collection()
    {
        $data = DB::table('barangs')
            ->join('pemasukans', 'barangs.kode', '=', 'pemasukans.kode')
            ->join('pengeluarans', 'barangs.kode', '=', 'pengeluarans.kode')
            ->join('kategoris', 'barangs.kategori_id', '=', 'kategoris.id')
            ->select(
                DB::raw("'Barang Masuk' as jenis_transaksi"),
                'pemasukans.kode_masuk as kode_masuk',
                'barangs.kode as kode_barang',
                'barangs.nama as nama_barang',
                'pemasukans.jumlah as jumlah',
                'pemasukans.tgl_terima as tgl_masuk',
                'pemasukans.lokasi as lokasi',
                'pemasukans.satuan as satuan',
                'pemasukans.nama_pemasok as nama_pemasok',
                'pemasukans.spesifikasi as spesifikasi_masuk'
            )
            ->union(
                DB::table('barangs')
                    ->join('pengeluarans', 'barangs.kode', '=', 'pengeluarans.kode')
                    ->join('kategoris', 'barangs.kategori_id', '=', 'kategoris.id')
                    ->select(
                        DB::raw("'Barang Keluar' as jenis_transaksi"),
                        'pengeluarans.kode_keluar as kode_keluar',
                        'barangs.kode as kode_barang',
                        'barangs.nama as nama_barang',
                        'pengeluarans.jumlah as jumlah',
                        'pengeluarans.tgl_keluar as tgl_keluar',
                        'pengeluarans.department as lokasi',
                        'pengeluarans.satuan as satuan',
                        'pengeluarans.nama_penerima as nama_pemasok',
                        'pengeluarans.spesifikasi as spesifikasi_keluar'
                    )
            )
            ->whereNotNull('pemasukans.kode_masuk') // Filter hanya data pemasukan yang ada
            ->orWhereNotNull('pengeluarans.kode_keluar') // Filter hanya data pengeluaran yang ada
            ->get();
        // dd($data);
        return $data;
    }

    public function headings(): array
    {
        return [
            'Tanggal Transaksi',
            'Jenis Transaksi',
            'Kode Transaksi',
            'Kode Barang',
            'Nama Barang',
            'Jumlah',
            'Satuan',
            'Lokasi',
            'Nama Pemasok/Penerima',
            'Spesifikasi',
        ];
    }

    public function map($item): array
    {
        return [
            $item->tgl_masuk ?? $item->tgl_keluar,
            $item->jenis_transaksi,
            $item->kode_masuk ?? $item->kode_keluar,
            $item->kode_barang,
            $item->nama_barang,
            strval($item->jumlah),
            $item->satuan,
            $item->lokasi,
            $item->nama_pemasok ?? $item->nama_penerima,
            // strip_tags($item->spesifikasi_masuk ?? $item->spesifikasi_keluar), 
            strip_tags(html_entity_decode($item->spesifikasi_masuk ?? $item->spesifikasi_keluar))

        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [
            1 => [
                'font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']], // Styling font tebal dan warna putih
                'fill' => ['fillType' => 'solid', 'startColor' => ['argb' => 'FF4CAF50']], // Warna latar belakang hijau
            ]
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 15, // Lebar kolom A
            'B' => 20, // Lebar kolom B
            'C' => 15, // Lebar kolom C
            'D' => 25, // Lebar kolom D
            'E' => 10, // Lebar kolom E
            'F' => 15, // Lebar kolom F
            'G' => 15, // Lebar kolom G
            'H' => 25, // Lebar kolom H
            'I' => 30, // Lebar kolom I
            'J' => 40, // Lebar kolom I
        ];
    }
}
