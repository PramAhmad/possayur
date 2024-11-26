<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Tax extends Model
{
    use LogsActivity;
    use HasFactory;
    protected $table = 'taxes';

    protected $fillable = ['outlet_id','name', 'rate', 'is_active'];
    protected static $logAttributes = [
        'outlet_id',
        'name',
        'rate'
    ];



    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->description = auth()->user();
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly([
                'outlet_id',
                'name',
                'rate',
            ]) 
         
            ->logUnguarded()
            ->logOnlyDirty()
            ->useLogName('tax');
    }
    

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
  
    
}

