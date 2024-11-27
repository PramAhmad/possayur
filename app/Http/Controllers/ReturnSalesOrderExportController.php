<?php

namespace App\Http\Controllers;

use App\Exports\ReturnSalesOrderExport;
use App\Models\ReturnSalesOrder;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReturnSalesOrderExportController extends Controller
{
    public function export()
    {
        return Excel::download(new ReturnSalesOrderExport, now().'_return_sales_order.xlsx');
    }
    public function pdf($id){
        $returnSalesOrder = ReturnSalesOrder::with(['productReturnSalesOrder','outlet','productReturnSalesOrder.product','productReturnSalesOrder.product.unit','productReturnSalesOrder.variant','productReturnSalesOrder.batch'])->findOrFail($id);
        $pdf = Pdf::loadView('return-sales-order.pdf', compact('returnSalesOrder'));
        return $pdf->download(now().'_return_sales_order.pdf');
    }
}
