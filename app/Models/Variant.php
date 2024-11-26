<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

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
            ->useLogName('Variant');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    
}
