<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;
    protected $table = 'purchase';
    protected $fillable = [
        'reference_no',
        'user_id',
        'supplier_id',
        'outlet_id',
        'total_qty',
        'total_discount',
        'total_tax',
        'total_cost',
        
        'order_tax_rate',
        'order_tax',
        'order_discount',
        'shipping_cost',
        'grand_total',
        'paid_amount',
        'status',
        'payment_status',
        'document',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Suplier::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
}
        public function productPurchase()
    {
        return $this->hasMany(ProductPurchase::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_purchase', 'purchase_id', 'product_id')->withPivot('quantity', 'unit_price', 'net_cost', 'total_cost');
    }


}
