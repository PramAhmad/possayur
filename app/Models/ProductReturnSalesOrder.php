<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReturnSalesOrder extends Model
{
    use HasFactory;

    protected $table = 'product_return_sales_order';
    protected $fillable = [
        'return_sales_order_id',
        'product_id',
        'variant_id',
        'batch_id',
        'qty',
        'price',
        'discount',
        'total',
    ];

    public function returnSalesOrder()
    {
        return $this->belongsTo(ReturnSalesOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
