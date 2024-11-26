<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class ProductSuratJalan extends Model
{
    use HasFactory;
    protected $table = 'product_surat_jalans';
    protected $fillable = [
        'surat_jalan_id',
        'product_id',
        'qty',
        'unit_price',
        'total_price',
        'variant_id',
        'batch_id',
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
            ->useLogName('ProductSuratJalan');
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function suratJalan()
    {
        return $this->belongsTo(SuratJalan::class);
    }

    public function variant()
    {
        return $this->belongsTo(Variant::class);
    }

    public function batch()
    {
        return $this->belongsTo(Batches::class);
    }

    public function suratJalans()
    {
        return $this->belongsToMany(SuratJalan::class, 'product_surat_jalans')->withPivot('qty', 'unit_price', 'total_price');
    }
    
}
