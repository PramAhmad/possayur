<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class Suplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $fillable = [
        'outlet_id',
        'name',
        'email',
        'phone',
        'address',
        'company',
        'bank_name',
        'bank_branch',
        'account_holder',
        'supplier_type',
        'account_number',
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
            ->useLogName('supplier');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
  
}
