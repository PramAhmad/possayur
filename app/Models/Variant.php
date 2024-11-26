<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    use HasFactory;
    protected $table = 'variants';

    protected $fillable = [
        'product_id',
        'outlet_id',
        'name',
        'qty',
        'item_code',
        'position',
        'additional_price'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    
}
