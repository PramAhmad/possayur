<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;
use Spatie\Activitylog\Traits\LogsActivity;

class Invoice extends Model
{
    use HasFactory;
    use LogsActivity;


    protected $table = 'invoices';
    protected $fillable = [
        'reference_number',
        'outlet_id',
        'sales_order_id',
        'surat_jalan_id',
        'total_qty',
        'discount',
        'tax',
        'grandtotal',
        'note',
        'paid_amount'
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
            ->useLogName('Invoice');
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function salesorder()
    {
        return $this->belongsTo(SalesOrder::class, 'sales_order_id');
    }

    public function suratJalan()
    {
        return $this->belongsTo(SuratJalan::class);
    }

    public function productInvoices()
    {
        return $this->hasMany(ProductInvoice::class);
    }

}
