<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StockOpnameTemplateExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
        $products = Product::all();

        return $products->map(function ($product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'current_stock' => $product->qty ?? 0,
                'actual_stock' => '',
                'notes' => 'Periksa stok fisik dengan teliti',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'product_id',
            'name',
            'current_stock',
            'actual_qty',
            'notes',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            // Header styling
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'F0F0F0'],
                ],
                'borders' => [
                    'bottom' => [
                        'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    ],
                ],
            ],
        ];
    }
}
