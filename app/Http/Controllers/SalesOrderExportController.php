<?php

namespace App\Http\Controllers;

use App\Exports\SalesOrderExport;
use App\Models\SalesOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Pdf\Mpdf;
use Rawilk\Printing\Facades\Printing;

class SalesOrderExportController extends Controller
{
    public function export()
    {
        return Excel::download(new SalesOrderExport, now() . 'sales_order.xlsx');
    }
    public function oldPdf($id)
    {
        $salesOrder = SalesOrder::with(
            'outlet',
            'customer',
            'products',
            'products.product',
            'returnSalesOrder',
            'invoice',
            'products.variant',
            'products.batch',
            'products.product.unit'
        )->find($id);

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set header (kiri: informasi perusahaan, kanan: invoice)
        $sheet->setCellValue('A1', 'Koyasai')->mergeCells('A1:F1')->getStyle('A1')->getFont()->setSize(16);
        $sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        $sheet->setCellValue('A2', strtoupper($salesOrder->outlet->name))->mergeCells('A2:F2')->getStyle('A2')->getFont()->setSize(14);
        $sheet->getStyle('A2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        $sheet->setCellValue('A3', $salesOrder->outlet->address)->mergeCells('A3:F3')->getStyle('A3')->getFont()->setSize(12);
        $sheet->getStyle('A3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        $sheet->setCellValue('A4', 'Telepon: +62 851-9898-9744 | Email: info@gubugbuah.com')->mergeCells('A4:F4')->getStyle('A4')->getFont()->setSize(12);
        $sheet->getStyle('A4')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        // Invoice info di kanan
        $sheet->setCellValue('G1', 'INVOICE')->mergeCells('G1:J1')->getStyle('G1')->getFont()->setSize(16);
        $sheet->getStyle('G1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        $sheet->setCellValue('G2', 'Tanggal: ' . $salesOrder->created_at->format('d M Y'))->mergeCells('G2:J2')->getStyle('G2')->getFont()->setSize(12);
        $sheet->getStyle('G2')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        $sheet->setCellValue('G3', 'No Invoice: INV-' . $salesOrder->id)->mergeCells('G3:J3')->getStyle('G3')->getFont()->setSize(12);
        $sheet->getStyle('G3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        // Customer info
        $sheet->setCellValue('A6', 'Kepada Yth: ' . $salesOrder->customer->name)->mergeCells('A6:F6')->getStyle('A6')->getFont()->setSize(12);
        $sheet->getStyle('A6')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        $sheet->setCellValue('A7', 'Alamat: ' . $salesOrder->customer->address)->mergeCells('A7:F7')->getStyle('A7')->getFont()->setSize(12);
        $sheet->getStyle('A7')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);
        $sheet->getStyle('A7')->getAlignment()->setWrapText(false);

        // Jarak antara header dan tabel
        $sheet->setCellValue('A9', ''); 

        // Table headers
        $sheet->setCellValue('A10', 'NO')->getStyle('A10')->getFont()->setSize(12);
        $sheet->setCellValue('B10', 'PRODUCT')->getStyle('B10')->getFont()->setSize(12);
        // Merge the product header cells
        $sheet->mergeCells('B10:D10');
        $sheet->setCellValue('E10', 'QTY')->getStyle('E10')->getFont()->setSize(12);
        $sheet->setCellValue('F10', 'UNIT')->getStyle('F10')->getFont()->setSize(12);
        $sheet->setCellValue('G10', 'UNIT PRICE')->getStyle('G10')->getFont()->setSize(12);
        $sheet->mergeCells('G10:H10');
        $sheet->getStyle('G10')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('I10', 'TOTAL')->getStyle('I10')->getFont()->setSize(12);
        $sheet->mergeCells('I10:J10');

        // Center align headers
        $sheet->getStyle('A10:J10')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Fixed row height for headers
        $sheet->getRowDimension(10)->setRowHeight(25);

        $row = 11;
        $no = 1;
        foreach ($salesOrder->products as $product) {
            $productName = $product->product->name;
            if ($product->variant) {
                $productName .= ' (Var: ' . $product->variant->name . ')';
            }
            if ($product->batch) {
                $productName .= ' (Batch: ' . $product->batch->batch_no . ')';
            }

            // Set row height for data rows
            $sheet->getRowDimension($row)->setRowHeight(22);

            // Nomor urut
            $sheet->setCellValue('A' . $row, $no)->getStyle('A' . $row)->getFont()->setSize(12);
            $sheet->getStyle('A' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            // Product info - dengan merge cells B-D
            $sheet->setCellValue('B' . $row, $productName)->getStyle('B' . $row)->getFont()->setSize(12);
            $sheet->mergeCells('B' . $row . ':D' . $row);
            $sheet->getStyle('B' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

            // Quantity
            $sheet->setCellValue('E' . $row, $product->qty)->getStyle('E' . $row)->getFont()->setSize(12);
            $sheet->getStyle('E' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            // Unit
            $sheet->setCellValue('F' . $row, "KG")->getStyle('F' . $row)->getFont()->setSize(12);
            $sheet->getStyle('F' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

            // Unit price
            $sheet->setCellValue('G' . $row, 'Rp ' . $this->formatCurrency($product->unit_price))->getStyle('G' . $row)->getFont()->setSize(12);
            $sheet->mergeCells('G' . $row . ':H' . $row);
            $sheet->getStyle('G' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);


            // Total price
            $sheet->setCellValue('I' . $row, 'Rp ' . $this->formatCurrency($product->total_price))->getStyle('I' . $row)->getFont()->setSize(12);
            $sheet->mergeCells('I' . $row . ':J' . $row);
            $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
            $no++;
            $row++;
        }

        // Grand Total row
        $grandTotalRow = $row;
        $sheet->getRowDimension($grandTotalRow)->setRowHeight(25);

        // Grand Total text in cell A with merge to H
        $sheet->setCellValue('A' . $grandTotalRow, 'GRAND TOTAL');
        $sheet->mergeCells('A' . $grandTotalRow . ':H' . $grandTotalRow);
        $sheet->getStyle('A' . $grandTotalRow)->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('A' . $grandTotalRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        // Total amount
        if (isset($salesOrder->grandtotal)) {
            $sheet->setCellValue('I' . $grandTotalRow, 'Rp ' . $this->formatCurrency($salesOrder->grandtotal));
            $sheet->mergeCells('I' . $grandTotalRow . ':J' . $grandTotalRow);
        } else {
            $sheet->setCellValue('I' . $grandTotalRow, 'Rp 0');
        }
        $sheet->getStyle('I' . $grandTotalRow)->getFont()->setBold(true)->setSize(12);
        $sheet->getStyle('I' . $grandTotalRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);
        // Apply borders to the whole table
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];
        $sheet->getStyle('A10:J' . $grandTotalRow)->applyFromArray($styleArray);

        // Remove borders between merged cells
        // For product columns (B-D)
        $noBorderStyle = [
            'borders' => [
                'right' => [
                    'borderStyle' => Border::BORDER_NONE,
                ],
            ],
        ];

        // Apply no-border style to B and C columns for all data rows
        for ($i = 11; $i < $grandTotalRow; $i++) {
            $sheet->getStyle('A' . $i)->applyFromArray($noBorderStyle);
            $sheet->getStyle('B' . $i)->applyFromArray($noBorderStyle);
            $sheet->getStyle('C' . $i)->applyFromArray($noBorderStyle);
            $sheet->getStyle('D' . $i)->applyFromArray($noBorderStyle);
        }


        $sheet->getStyle('A' . $grandTotalRow . ':H' . $grandTotalRow)->applyFromArray([
            'borders' => [
                'right' => [
                    'borderStyle' => Border::BORDER_NONE,
                ],
            ],
        ]);

        // Make sure the bottom border remains for all cells in the grand total row
        $sheet->getStyle('A' . $grandTotalRow . ':J' . $grandTotalRow)->applyFromArray([
            'borders' => [
                'bottom' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ]);

        // Add signature section with 4 columns
        $signatureRow = $grandTotalRow + 5;

        // Header for signature section
        $sheet->setCellValue('A' . $signatureRow, 'Penerima,')->getStyle('A' . $signatureRow)->getFont()->setSize(12);
        $sheet->getStyle('A' . $signatureRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_LEFT);

        $sheet->setCellValue('I' . $signatureRow, 'Hormat kami,')->getStyle('I' . $signatureRow)->getFont()->setSize(12);
        $sheet->getStyle('I' . $signatureRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_RIGHT);

        // Add space for signatures (5 rows down)
        $signatureSpace = $signatureRow + 5;

        // First row of signatures (Customer and Company)
        $sheet->setCellValue('A' . $signatureSpace, 'PT SINAR RASA CEMERLANG')->mergeCells('A' . $signatureSpace . ':C' . $signatureSpace);
        $sheet->getStyle('A' . $signatureSpace)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('A' . $signatureSpace)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('H' . $signatureSpace, 'PT GAUTAMA BERKAT USAHA')->mergeCells('H' . $signatureSpace . ':J' . $signatureSpace);
        $sheet->getStyle('H' . $signatureSpace)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('H' . $signatureSpace)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Second row of signatures (Driver and Packer) - 10 rows down from first signature
        $secondSignatureRow = $signatureSpace + 10;

        $sheet->setCellValue('A' . $secondSignatureRow, 'DRIVER')->mergeCells('A' . $secondSignatureRow . ':C' . $secondSignatureRow);
        $sheet->getStyle('A' . $secondSignatureRow)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('A' . $secondSignatureRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        $sheet->setCellValue('H' . $secondSignatureRow, 'PACKER')->mergeCells('H' . $secondSignatureRow . ':J' . $secondSignatureRow);
        $sheet->getStyle('H' . $secondSignatureRow)->getBorders()->getBottom()->setBorderStyle(Border::BORDER_THIN);
        $sheet->getStyle('H' . $secondSignatureRow)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Set column widths
        $sheet->getColumnDimension('A')->setWidth(5);   // NO
        $sheet->getColumnDimension('B')->setWidth(25);  // PRODUCT (merged B-D
        $sheet->getColumnDimension('C')->setWidth(10);  // Part of PRODUCT
        $sheet->getColumnDimension('D')->setWidth(10);  // Part of PRODUCT
        $sheet->getColumnDimension('E')->setWidth(8);   // QTY
        $sheet->getColumnDimension('F')->setWidth(8);   // UNIT
        $sheet->getColumnDimension('G')->setWidth(15);  // UNIT PRICE
        $sheet->getColumnDimension('H')->setWidth(8);   // Empty column between prices
        $sheet->getColumnDimension('I')->setWidth(15);  // TOTAL
        $sheet->getColumnDimension('J')->setWidth(8);   // Last column

        // Save to file (Excel)
        $fileName = 'salesorder_' . now()->format('YmdHis') . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);

        // Konversi ke PDF

        $pdfFileName = str_replace('.xlsx', '.pdf', $fileName);
        $pdfWriter = new Mpdf($spreadsheet);
        $pdfWriter->save($pdfFileName);

        // Redirect ke halaman yang berisi embed PDF dan JavaScript untuk auto-print
        $pdfUrl = url($pdfFileName);
        
        echo "<script>
            window.onload = function() {
                window.open('$pdfUrl', '_blank').print();
            };
          </script>";
        return;
    }

    public function pdf($id)
    {
        $salesOrder = SalesOrder::with(
            'outlet',
            'customer',
            'products',
            'products.product',
            'returnSalesOrder',
            'invoice',
            'products.variant',
            'products.batch',
            'products.product.unit'
        )->find($id);

        $isDirectPrint = false;
        $isGenereratedPdf = true;

        $pdf = Pdf::loadView('salesorder.print', compact('salesOrder', 'isDirectPrint', 'isGenereratedPdf'));

        return $pdf->download('Sales Order ' . $salesOrder->reference_no . ' '. now()->format('Ymd_His') .'.pdf');
    }

    public function print(Request $request, $id)
    {
        $isDirectPrint = false;
        $isGenereratedPdf = false;

        $salesOrder = SalesOrder::with(
            'outlet',
            'customer',
            'products',
            'products.product',
            'returnSalesOrder',
            'invoice',
            'products.variant',
            'products.batch',
            'products.product.unit'
        )->find($id);

        if ($request->action == 'direct_print') {
            $isDirectPrint = true;
            
            $pdf = Pdf::loadView('salesorder.print', compact('salesOrder', 'isDirectPrint', 'isGenereratedPdf'));
            $content = $pdf->download()->getOriginalContent();
            $filename = 'sales-order_' . $id . '.pdf';

            if (Storage::put('public/direct-print/'. $filename, $content)) {
                return response()->json(asset('storage/direct-print/' . $filename), 200);
            }

            return response()->json('Failed to save PDF', 500);
        }

        return view('salesorder.print', compact('salesOrder', 'isDirectPrint', 'isGenereratedPdf'))->render();
    }

    // Helper functon to format currency
    private function formatCurrency($amount)
    {
        return  number_format($amount, 0, ',', '.');
    }


    // public function print($id)
    // {
    //     // stream pdf
    //     $salesOrder = SalesOrder::with('outlet', 'customer', 'products', 'products.product', 'returnSalesOrder', 'invoice', 'products.variant', 'products.batch', 'products.product.unit')->find($id);

    //     $pdf = Pdf::loadView('salesorder.pdf', compact('salesOrder'));
    //     return $pdf->stream();
    // }
}
