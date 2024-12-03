<?php

namespace App\Http\Controllers;

use App\Exports\SalesOrderExport;
use App\Models\SalesOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SalesOrderExportController extends Controller
{
    public function export()
    {
        return Excel::download(new SalesOrderExport, now().'sales_order.xlsx');
    }

    // pdf dompdf
    public function pdf($id){
        $salesOrder = SalesOrder::with('outlet', 'customer', 'products', 'products.product', 'returnSalesOrder', 'invoice','products.variant','products.batch','products.product.unit')->find($id);
        
        $pdf = Pdf::loadView('salesorder.pdf', compact('salesOrder'));
        return $pdf->download(now().'sales_order.pdf');
    } 
    
    public function print($id){
        // stream pdf
        $salesOrder = SalesOrder::with('outlet', 'customer', 'products', 'products.product', 'returnSalesOrder', 'invoice','products.variant','products.batch','products.product.unit')->find($id);

        $pdf = Pdf::loadView('salesorder.pdf', compact('salesOrder'));
        return $pdf->stream();
    }
}
