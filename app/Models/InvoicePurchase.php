<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoicePurchase extends Model
{
    use HasFactory;

    protected $table = 'invoice_purchases';

    protected $fillable = [
        'outlet_id',
        'invoice_number',
        'purchase_id',
        'supplier_id',
        'user_id',
        'total_qty',
        'discount',
        'grand_total',
        'total_cost',
        'note',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_id');
    }

    public function supplier()
    {
        return $this->belongsTo(Suplier::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productInvoicePurchases()
    {
        return $this->hasMany(ProductInvoicePurchase::class);
    }

}
