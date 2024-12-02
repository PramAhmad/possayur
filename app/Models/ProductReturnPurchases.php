<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReturnPurchases extends Model
{
    use HasFactory;

    protected $fillable = [
        'return_purchase_id',
        'product_id',
        'variant_id',
        'batch_id',
        'qty',
        'price',
        'discount',
        'tax',
        'total',
    ];

    public function returnPurchase()
    {
        return $this->belongsTo(ReturnPurchases::class);
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
}
