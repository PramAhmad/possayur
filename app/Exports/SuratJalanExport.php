<?php

namespace App\Exports;

use App\Models\SuratJalan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SuratJalanExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting, WithStyles
{
    /**
     * Mengambil data untuk diekspor
     */
    public function collection()
    {
        return SuratJalan::with('salesOrder:id,reference_no')->get();
    }

    /**
     * Menentukan heading untuk file Excel
     */
    public function headings(): array
    {
        return [
            'ID',
            'Sales Order',
            'Packer',
            'Driver',
            'Due Date',
            'Signature Gudang',
            'Signature Penerima',
            'Signature Driver',
            'Total Qty',
            'Grand Total'
        ];
    }

    /**
     * Memformat data setiap baris dalam file Excel
     */
    public function map($suratJalan): array
    {
        return [
            $suratJalan->id,
            $suratJalan->salesOrder->reference_no ?? '-',
            $suratJalan->packer ?? '-',
            $suratJalan->driver ?? '-',
            $suratJalan->due_date ?? '-',
            $suratJalan->signature_gudang ?? '-',
            $suratJalan->signature_penerima ?? '-',
            $suratJalan->signature_driver ?? '-',
            $suratJalan->total_qty,
            number_format($suratJalan->grand_total, 2)
        ];
    }

    /**
     * Mengatur format kolom di Excel
     */
    public function columnFormats(): array
    {
        return [
            'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1, // Grand Total
        ];
    }

    /**
     * Menambahkan style ke sheet Excel
     */
    public function styles(Worksheet $sheet)
    {
        // Set header bold dan background warna emas
        $sheet->getStyle('A1:J1')->getFont()->setBold(true);
        $sheet->getStyle('A1:J1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD700');

        // Atur lebar kolom otomatis
        foreach (range('A', 'J') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
    }
}
