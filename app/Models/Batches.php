<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
