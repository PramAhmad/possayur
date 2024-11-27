<?php

namespace App\Http\Controllers;

use App\Exports\InvoiceExport;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
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
        $pdf = Pdf::loadView('invoice-penagihan.pdf', compact('invoice'));
        return $pdf->download(now().'_invoice_penagihan.pdf');
    }
}
