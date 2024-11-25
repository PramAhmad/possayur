<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInvoice extends Model
{
    use HasFactory;
    protected $table = 'product_invoices';
    protected $fillable = [
        'invoice_id',
        'product_id',
        'variant_id',
        'batch_id',
        'qty',
        'price',
        'discount',
        'total',
    ];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }


}
