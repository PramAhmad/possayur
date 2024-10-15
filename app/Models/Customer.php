<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = [
        'is_active',
        'customer_group_id',
        'user_id',
        'company_name',
        'phone',
        'tax',
        'address',
        'country',
        'postal_code',
        'city',
        'state',


    ];

    public function customerGroup()
    {
        return $this->belongsTo(CustomerGroup::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
