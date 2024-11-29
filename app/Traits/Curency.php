<?php
namespace App\Traits;



trait CurencyFormatter
{
    public function formatCurency($value, $symbol = 'Rp', $decimal = 0)
    {
        return $symbol . number_format($value, $decimal, ',', '.');
    }
}