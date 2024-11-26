<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class Batches extends Model
{
    use HasFactory;
    protected $table = 'batches';
    protected $fillable = [
        'product_id',
        'batch_no',
        'qty',
        'price',
        'expired_date'
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
            ->useLogName('Batches');
    }
    

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
