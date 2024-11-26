<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSalesOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'sales_order_id',
        'variant_id',
        'batch_id',
        'product_id',
        'quantity',
        'unit_price',
        'total_price',
        'qty',
        'discount',
        'tax',
    ];

    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
    public function batch()
    {
        return $this->belongsTo(Batches::class);
    }
    public function salesOrders()
{
    return $this->belongsToMany(SalesOrder::class, 'product_sales_orders')->withPivot('qty', 'unit_price', 'total_price', 'discount', 'tax');

}
}