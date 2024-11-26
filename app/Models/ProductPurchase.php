<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

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
        'variant_id',
        'batch_id',
    ];
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
            ->useLogName('ProductPurchase');
    }

    public function purchase()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }
    // product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    // variant
    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }
    // batch
    public function batch()
    {
        return $this->belongsTo(Batches::class);
    }
    // has many product purchase return
    



}
