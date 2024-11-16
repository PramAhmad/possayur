<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    protected $table = 'taxes';
    protected $fillable = ['outlet_id','name', 'rate', 'is_active'];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
