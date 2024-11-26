<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon';

    protected $fillable = [
        'outlet_id',
        'code',
        'type',
        'amount',
        'min_amount',
        'qty',
        'used',
        'exp_date',
        'user_id',
        'is_active'
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
            ->useLogName('Coupon');
    }

}
