<?php

namespace App\Exports;

use App\Models\SalesOrder;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SalesOrderExport implements FromCollection, WithHeadings, WithMapping, WithColumnFormatting, WithStyles
{
    /**
     * Mengambil data untuk diekspor
     */
    public function collection()
    {
        return SalesOrder::with('outlet:id,name', 'customer:id,name')->get();
    }

    /**
     * Menentukan heading untuk file Excel
     */
    public function headings(): array
    {
        return [
            'Reference No',
            'Customer Name',
            'Outlet Name',
            'Paid Amount',
            'Order Date',
            'Status',
            'Total Price',
            'Total Qty',
            'Total Discount',
            'Total Tax',
            'Order Tax Rate',
            'Coupon ID',
            'Note'
        ];
    }

    /**
     * Memformat data setiap baris dalam file Excel
     */
    public function map($order): array
    {
        return [
            $order->reference_no,
            $order->customer->name ?? '-',
            $order->outlet->name ?? '-',
            number_format($order->paid_amount, 2),
            $order->created_at->format('Y-m-d'),
            ucfirst($order->status),
            number_format($order->grandtotal, 2),
            $order->total_qty,
            number_format($order->total_discount, 2),
            number_format($order->total_tax, 2),
            number_format($order->order_tax_rate, 2) . '%',
            $order->coupon_id ?? '-',
            $order->note ?? '-'
        ];
    }

    /**
     * Mengatur format kolom di Excel
     */
    public function columnFormats(): array
    {
        return [
            'D' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1, // Paid Amount
            'G' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1, // Total Price
            'I' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1, // Total Discount
            'J' => NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1, // Total Tax
        ];
    }

    /**
     * Menambahkan style ke sheet Excel
     */
    public function styles(Worksheet $sheet)
    {
        // Set header bold dan background warna emas
        $sheet->getStyle('A1:M1')->getFont()->setBold(true);
        $sheet->getStyle('A1:M1')->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB('FFD700');

        // Atur lebar kolom otomatis
        foreach (range('A', 'M') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Warna status
        foreach ($sheet->getRowIterator() as $row) {
            $rowIndex = $row->getRowIndex();
            if ($rowIndex === 1) continue; // Skip header

            $statusCell = 'F' . $rowIndex; // Kolom Status
            $statusValue = $sheet->getCell($statusCell)->getValue();

            $color = match (strtolower($statusValue)) {
                'pending'   => 'FFFF00', // Kuning
                'completed' => '00FF00', // Hijau
                'cancelled' => 'FF0000', // Merah
                default     => 'FFFFFF', // Putih
            };

            $sheet->getStyle($statusCell)->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setARGB($color);
        }
    }
}
