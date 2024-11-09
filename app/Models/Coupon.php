<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $table = 'coupon';

    protected $fillable = [
        'outlet_id',
        'code',
        'type',
        'amount',
        'min_amount',
        'qty',
        'used',
        'exp_date',
        'user_id',
        'is_active'
    ];

}
