<?php

namespace App\Exports;

use App\Models\InvoicePurchase as ModelsInvoicePurchase;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class InvoicePurchase implements FromCollection, WithHeadings, WithStyles
{
     /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ModelsInvoicePurchase::with('outlet')->get(); // Load outlet relationship
    }

    /**
     * Define the headings for the Excel sheet.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Outlet Name', // Ambil nama outlet dari relasi
            'Invoice Number',
            'Purchase ID',
            'Supplier ID',
            'User ID',
            'Total Qty',
            'Discount',
            'Grand Total',
            'Total Cost',
            'Note',
        ];
    }

    /**
     * Apply styles to the sheet.
     *
     * @param Worksheet $sheet
     * @return array
     */
    public function styles(Worksheet $sheet)
    {
        return [
            // Style untuk header (baris pertama)
            1 => [
                'font' => ['bold' => true, 'color' => ['rgb' => 'FFFFFF']],
                'fill' => ['fillType' => 'solid', 'startColor' => ['rgb' => '4F81BD']],
            ],
            // Set minimum width untuk semua kolom
            'A:J' => [
                'minWidth' => 15,
            ],
        ];
    }

    /**
     * Format kolom tertentu (misalnya, currency).
     *
     * @return array
     */
 

    /**
     * Map data dari collection ke format yang sesuai dengan headings.
     *
     * @return array
     */
    public function map($invoicePurchase): array
    {
        return [
            $invoicePurchase->outlet->name, // Ambil nama outlet dari relasi
            $invoicePurchase->invoice_number,
            $invoicePurchase->purchase_id,
            $invoicePurchase->supplier_id,
            $invoicePurchase->user_id,
            $invoicePurchase->total_qty,
            $invoicePurchase->discount,
            $invoicePurchase->grand_total,
            $invoicePurchase->total_cost,
            $invoicePurchase->note,
        ];
    }
}
