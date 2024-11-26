<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Models\Activity;

class SalesOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'reference_no',
        'paid_amount',
        'grandtotal',   
        'customer_id',
        'outlet_id',
        'user_id',
        'order_date',
        'due_date',
        'status',
        'total_price',
        'total_qty',
        'discount',
        'tax',
        'grand_total',
        'note',
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
            ->useLogName('SalesOrder');
    }
    public function customer()
    {
    return $this->belongsTo(Customer::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
    {
        return $this->hasMany(ProductSalesOrder::class);
    }   

    public function returnSalesOrder()
    {
        return $this->hasOne(ReturnSalesOrder::class);
    }
    // invoice
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
    public function suratJalan()
    {
        return $this->hasOne(SuratJalan::class);
    }
    // pivot product
public function productSalesOrders()
    {
        return $this->belongsToMany(Product::class, 'product_sales_orders')->withPivot('qty', 'unit_price', 'total_price', 'discount', 'tax');
    }
}
