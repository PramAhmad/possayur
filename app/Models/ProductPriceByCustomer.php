<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPriceByCustomer extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'customer_id',
        'outlet_id',
        'price',
        'start_date',
        'end_date',
        
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
