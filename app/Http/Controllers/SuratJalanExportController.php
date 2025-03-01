<?php

namespace App\Http\Controllers;

use App\Exports\SuratJalanExport;
use App\Models\SuratJalan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class SuratJalanExportController extends Controller
{
    public function export()
    {
        return Excel::download(new SuratJalanExport, now() . 'surat_jalan.xlsx');
    }

    public function pdf($id)
    {
        $suratJalan = SuratJalan::with(['salesorder.products.product', 'salesorder.products.variant', 'salesorder.products.batch', 'salesorder.outlet', 'salesorder.customer', 'productSuratJalans.product', 'productSuratJalans.variant', 'productSuratJalans.batch', 'productSuratJalans.product.unit'])->findOrFail($id);
        $isDirectPrint = false;
        $isGenereratedPdf = true;

        $pdf = Pdf::loadView('suratjalan.print', compact('suratJalan', 'isDirectPrint', 'isGenereratedPdf'));

        return $pdf->download('Surat Jalan ' . ($suratJalan->reference_no ?? 'SO ' . $suratJalan?->salesorder?->reference_no) . ' ' . now()->format('Ymd_His') . '.pdf');
    }

    // public function print($id){
    //     $suratJalan = SuratJalan::with(['salesorder.products.product','salesorder.products.variant','salesorder.products.batch','salesorder.outlet','salesorder.customer','productSuratJalans.product','productSuratJalans.variant','productSuratJalans.batch','productSuratJalans.product.unit'])->findOrFail($id);

    //     $pdf = Pdf::loadView('suratjalan.pdf', compact('suratJalan'));
    //     return $pdf->stream();
    // }

    public function print(Request $request, $id)
    {
        $isDirectPrint = false;
        $isGenereratedPdf = false;

        $suratJalan = SuratJalan::with(['salesorder.products.product', 'salesorder.products.variant', 'salesorder.products.batch', 'salesorder.outlet', 'salesorder.customer', 'productSuratJalans.product', 'productSuratJalans.variant', 'productSuratJalans.batch', 'productSuratJalans.product.unit'])->findOrFail($id);

        if ($request->action == 'direct_print') {
            $isDirectPrint = true;
            $pdf = Pdf::loadView('suratjalan.print', compact('suratJalan', 'isDirectPrint', 'isGenereratedPdf'));
            $content = $pdf->download()->getOriginalContent();
            $filename = 'surat-jalan_' . $id . '.pdf';

            if (Storage::put('public/direct-print/' . $filename, $content)) {
                return response()->json(asset('storage/direct-print/' . $filename), 200);
            }

            return response()->json('Failed to save PDF', 500);
        }

        return view('suratjalan.print', compact('suratJalan', 'isDirectPrint', 'isGenereratedPdf'))->render();
    }
}
