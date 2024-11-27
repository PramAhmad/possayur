<?php

namespace App\Http\Controllers;

use App\Exports\SuratJalanExport;
use App\Models\SuratJalan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class SuratJalanExportController extends Controller
{
    public function export()
    {
        return Excel::download(new SuratJalanExport, now().'surat_jalan.xlsx');
    }   
    
    public function pdf($id){
        $suratJalan = SuratJalan::with(['salesorder.products.product','salesorder.products.variant','salesorder.products.batch','salesorder.outlet','salesorder.customer','productSuratJalans.product','productSuratJalans.variant','productSuratJalans.batch','productSuratJalans.product.unit'])->findOrFail($id);

        $pdf = Pdf::loadView('suratjalan.pdf', compact('suratJalan'));
        return $pdf->download(now().'surat_jalan.pdf');
    }
}
