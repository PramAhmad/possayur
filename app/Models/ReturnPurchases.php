<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnPurchases extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
      'outlet_id',
        'purchase_id',
        'return_number',
        'return_date',
        'note',
        'total_qty',
        'total_discount',
        'total_tax',
        'grand_total',
        'document',
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function purchase()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class, 'purchase_id');
    }
    public function products()
    {
        return $this->hasMany(ProductReturnPurchases::class);
    }


    public function productReturnPurchases()
    {
        return $this->hasMany(ProductReturnPurchases::class, 'return_purchase_id');
    }
    
    

}
