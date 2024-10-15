<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
    use HasFactory;
    protected $table = 'supplier';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'company',
        'shop_name',
        'bank_name',
        'bank_branch',
        'account_holder',
        'account_number',
    ];
}
