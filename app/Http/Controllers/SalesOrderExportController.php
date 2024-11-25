<?php

namespace App\Http\Controllers;

use App\Exports\SalesOrderExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SalesOrderExportController extends Controller
{
    public function export()
    {
        return Excel::download(new SalesOrderExport, now().'sales_order.xlsx');
    }
}
