<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInvoicePurchase extends Model
{
    use HasFactory;

    protected $table = 'product_invoice_purchases';

    protected $fillable = [
        'invoice_purchase_id',
        'product_id',
        'variant_id',
        'batch_id',
        'qty',
        'price',
        'discount',
        'tax',
        'total_price',
    ];

    public function invoicePurchase()
    {
        return $this->belongsTo(InvoicePurchase::class, 'invoice_purchase_id');
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
