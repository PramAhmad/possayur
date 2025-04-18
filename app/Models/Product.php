<?php

namespace App\Models;

use Illuminate\Bus\Batch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $guarded = [];

    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->description = auth()->user();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logUnguarded()
            ->logOnlyDirty()
            ->useLogName('Product');
    }
    public function variants (){
        return $this->hasMany(Variant::class);
    }
    // bacthes
    public function batches (){
        return $this->hasMany(Batches::class);
    }

    public function category (){
        return $this->belongsTo(Category::class);
    }
    public function outlet (){
        return $this->belongsTo(Outlet::class);
    }
 
    public function brand (){
        return $this->belongsTo(Brand::class);
    }
    public function unit()
    {
    return $this->belongsTo(Unit::class, 'unit_id');
}

    public function productPriceByCustomer (){
        return $this->hasMany(ProductPriceByCustomer::class);
    }

    public function productSalesOrder (){
        return $this->hasMany(ProductSalesOrder::class);
    }
    public function productInvoice (){
        return $this->hasMany(ProductInvoice::class);
    }
    public function productSuratJalan (){
        return $this->hasMany(ProductSuratJalan::class);
    }
    

    
}
