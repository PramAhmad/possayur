<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class CustomerGroup extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'customer_group';
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
            ->useLogName('CustomerGroup');
    }
    protected $fillable = ['name', 'percentage', 'is_active'];
}
