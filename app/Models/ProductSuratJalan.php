<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function suratJalan()
    {
        return $this->belongsTo(SuratJalan::class);
    }

    
}
