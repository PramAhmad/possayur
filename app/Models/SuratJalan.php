<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class SuratJalan extends Model
{
    use HasFactory;
    protected $table = 'surat_jalans';

    protected $guarded = [];
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
            ->useLogName('SuratJalan');
    }

    public function salesorder()
    {
        return $this->belongsTo(SalesOrder::class, 'sales_order_id');
    }

    public function productSuratJalans()
    {
        return $this->hasMany(ProductSuratJalan::class);
    }
    


}
