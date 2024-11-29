<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Curency extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'curencys';
    protected $fillable = ['name', 'symbol', 'code', 'is_active', 'outlet_id']; 
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
            ->useLogName('curencys');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
}
}
