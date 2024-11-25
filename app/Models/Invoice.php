<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

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
    ];

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
