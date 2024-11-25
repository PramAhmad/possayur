<?php

namespace App\Exports;

use App\Models\SuratJalan;
use Maatwebsite\Excel\Concerns\FromCollection;

class SuratJalanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return SuratJalan::all();
    }
}
