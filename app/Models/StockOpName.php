<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class StockOpName extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'outlet_id',
        'opname_date',
        'initial_qty',
        'actual_qty',
        'difference',
        'note',
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
            ->useLogName('StockOpName');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
    protected static function boot()
    {
        parent::boot();
        
        static::saving(function ($stockOpname) {
            $stockOpname->difference = $stockOpname->actual_qty - $stockOpname->initial_qty;
        });
    }
}
