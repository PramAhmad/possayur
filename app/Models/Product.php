<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $guarded = [];
    // belongs to category
    public function category (){
        return $this->belongsTo(Category::class);
    }
    public function outlet (){
        return $this->belongsTo(Outlet::class);
    }
    public function variant (){
        return $this->belongsTo(Variant::class);
    }
    public function brand (){
        return $this->belongsTo(Brand::class);
    }
    // has many product price by customer
    public function productPriceByCustomer (){
        return $this->hasMany(ProductPriceByCustomer::class);
    }
    
}
