<?php

namespace App\Http\Controllers;

use App\Exports\InvoiceExport;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class InvoicePenagihanExportController extends Controller
{
    public function export()
    {
        return Excel::download(new InvoiceExport, now().'_invoice_penagihan.xlsx');
    }

    public function pdf($id){
        $invoice = Invoice::with(['salesorder','suratJalan','salesorder.customer','salesorder.products','suratJalan.productSuratJalans','salesorder.returnSalesOrder','salesorder.returnSalesOrder.productReturnSalesOrder', 'outlet', 'productInvoices', 'productInvoices.product','productInvoices.product.unit','productInvoices.variant','productInvoices.batch'])
                            ->findOrFail($id);

        $isDirectPrint = false;
        $isGenereratedPdf = true;

        $pdf = Pdf::loadView('invoice-penagihan.print', compact('invoice', 'isDirectPrint', 'isGenereratedPdf'));

        return $pdf->download('Invoice ' . str_replace('/', '_', $invoice->reference_number) . ' ' . now()->format('Ymd_His') . '.pdf');
    }

    public function print(Request $request, $id)
    {
        $isDirectPrint = false;
        $isGenereratedPdf = false;

        $invoice = Invoice::with(['salesorder', 'suratJalan', 'salesorder.customer', 'salesorder.products', 'suratJalan.productSuratJalans', 'salesorder.returnSalesOrder', 'salesorder.returnSalesOrder.productReturnSalesOrder', 'outlet', 'productInvoices', 'productInvoices.product', 'productInvoices.product.unit', 'productInvoices.variant', 'productInvoices.batch'])->findOrFail($id);

        if ($request->action == 'direct_print') {
            $isDirectPrint = true;
            // return view('invoice-penagihan.print', compact('invoice', 'isDirectPrint', 'isGenereratedPdf'))->render();
            
            $pdf = Pdf::loadView('invoice-penagihan.print', compact('invoice', 'isDirectPrint', 'isGenereratedPdf'));
            $content = $pdf->download()->getOriginalContent();
            $filename = 'invoice_' . $id . '.pdf';

            if (Storage::put('public/direct-print/' . $filename, $content)) {
                return response()->json(asset('storage/direct-print/' . $filename), 200);
            }

            return response()->json('Failed to save PDF', 500);
        }

        return view('invoice-penagihan.print', compact('invoice', 'isDirectPrint', 'isGenereratedPdf'))->render();
    }
}
