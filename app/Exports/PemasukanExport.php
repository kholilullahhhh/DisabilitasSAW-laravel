<?php

namespace App\Exports;

use App\Models\Pemasukan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PemasukanExport implements FromCollection, WithHeadings, WithMapping, WithStyles, WithColumnWidths
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pemasukan::all();
    }

    public function headings(): array
    {
        return [
            'Tanggal terima barang',
            'Kode Transaksi',
            'Nama Barang',
            'Deskripsi',
            'Stok',
            'Satuan',
            'Lokasi',
            'Nama Pemasok',
            'Kategori',
        ];
    }

    public function map($item): array
    {
        return [
            $item->tgl_terima, 
            $item->kode_masuk,
            $item->barang->nama,
            strip_tags(html_entity_decode($item->spesifikasi)), 
            strval($item->jumlah),
            $item->satuan,
            $item->lokasi,
            $item->nama_pemasok,
            $item->barang->kategori->nama,
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true, 'color' => ['argb' => 'FFFFFFFF']],
                  'fill' => ['fillType' => 'solid', 'startColor' => ['argb' => 'FF4CAF50']]]
        ];
    }

    // Adjust column widths based on the maximum length of data in each column
    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 20,
            'C' => 30,
            'D' => 10,
            'E' => 20,
            'F' => 15,
            'G' => 15,
            'H' => 15,
            'I' => 20,
        ];
    }
}
