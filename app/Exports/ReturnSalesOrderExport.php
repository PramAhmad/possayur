<?php

namespace App\Exports;

use App\Models\ReturnSalesOrder;
use Maatwebsite\Excel\Concerns\FromCollection;

class ReturnSalesOrderExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ReturnSalesOrder::all();
    }
}
