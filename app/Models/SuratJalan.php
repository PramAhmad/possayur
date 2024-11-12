<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratJalan extends Model
{
    use HasFactory;
    protected $table = 'surat_jalans';

    protected $guarded = [];

    public function salesorder()
    {
        return $this->belongsTo(SalesOrder::class, 'sales_order_id');
    }

    public function productSuratJalans()
    {
        return $this->hasMany(ProductSuratJalan::class);
    }
    


}
