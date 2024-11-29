<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Customer extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table = 'customer';
    protected $fillable = [
        'name',
        'email',
        'is_active',
        'customer_group_id',
        'user_id',
        'company_name',
        'phone',
        'tax',
        'address',
        'country',
        'postal_code',
        'city',
        'state',


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
            ->useLogName('Customer');
    }
    public function customerGroup()
    {
        return $this->belongsTo(CustomerGroup::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
