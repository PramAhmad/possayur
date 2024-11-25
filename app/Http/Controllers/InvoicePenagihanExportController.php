<?php

namespace App\Http\Controllers;

use App\Exports\InvoiceExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InvoicePenagihanExportController extends Controller
{
    public function export()
    {
        return Excel::download(new InvoiceExport, now().'_invoice_penagihan.xlsx');
    }
}
