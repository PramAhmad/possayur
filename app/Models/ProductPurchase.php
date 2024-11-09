<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    use HasFactory;
    protected $table = 'product_purchase';
    protected $fillable = [
        'id',
        'purchase_id',
        'product_id',
        'quantity',
        'net_cost',
        'unit_price',
        'receive',
        'total_cost',
        
    ];

    public function purchase()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
    // product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    // has many product purchase return
    



}
