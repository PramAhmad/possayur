<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Product([
            'outlet_id'     => $row['outlet_id'],
            'name'          => $row['name'],
            'cost_price'    => $row['cost_price'],
            'selling_price' => $row['selling_price'],
            'qty'           => $row['qty'],
            'alert_qty'     => $row['alert_qty'],
            'sku'           => $row['sku'],
            'description'   => $row['description'],
            'category_id'   => $row['category_id'],
            'brand_id'      => $row['brand_id'],
            'unit_id'       => $row['unit_id'],
        ]);
    }
}
