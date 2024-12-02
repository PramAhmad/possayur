<?php

namespace App\Exports;

use App\Models\InvoicePurchase as ModelsInvoicePurchase;
use Maatwebsite\Excel\Concerns\FromCollection;

class InvoicePurchase implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ModelsInvoicePurchase::all();
    }
}
