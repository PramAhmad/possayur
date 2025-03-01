<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'is_active', 'image','outlet_id'];
    protected $table = 'brand';
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
            ->useLogName('Brand');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
