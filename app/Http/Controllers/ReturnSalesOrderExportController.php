<?php

namespace App\Http\Controllers;

use App\Exports\ReturnSalesOrderExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReturnSalesOrderExportController extends Controller
{
    public function export()
    {
        return Excel::download(new ReturnSalesOrderExport, now().'_return_sales_order.xlsx');
    }
}
