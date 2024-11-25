<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnSalesOrder extends Model
{
    use HasFactory;
    protected $table = 'return_sales_order';
    protected $guarded = [];

    public function salesOrder()
    {
        return $this->belongsTo(SalesOrder::class, 'sales_order_id');
    }

    public function productReturnSalesOrder()
    {
        return $this->hasMany(ProductReturnSalesOrder::class);
    }

  
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
