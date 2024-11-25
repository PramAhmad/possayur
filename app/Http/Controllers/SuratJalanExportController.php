<?php

namespace App\Http\Controllers;

use App\Exports\SuratJalanExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SuratJalanExportController extends Controller
{
    public function export()
    {
        return Excel::download(new SuratJalanExport, now().'surat_jalan.xlsx');
    }          
}
