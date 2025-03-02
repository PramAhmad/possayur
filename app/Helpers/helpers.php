<?php

use App\Models\Curency;
use App\Settings\GeneralSettings;
use Riskihajar\Terbilang\Facades\Terbilang;

function getSettings($key)
{
    return app(GeneralSettings::class)->$key ?? null;
}
if (!function_exists('currency')) {
    function currency($amount)
    {
        $currency = Curency::where('is_active', true)->first();
        $symbol = $currency->symbol;
        $code = $currency->code;
        // using dot number format
        return $code . ' ' . number_format($amount, 0, ',', '.');
    }
}


function getSelected(): string
{
    if (request()->routeIs('users.*')) {
        return 'tab_two';
    } elseif (request()->routeIs('permissions.*')) {
        return 'tab_three';
    } elseif (request()->routeIs('roles.*')) {
        return 'tab_three';
    } elseif (request()->routeIs('database-backups.*')) {
        return 'tab_four';
    } elseif (request()->routeIs('general-settings.*')) {
        return 'tab_five';
    } elseif (request()->routeIs('dashboards.*')) {
        return 'tab_one';
    } else {
        return 'tab_one';
    }
}

function idrAmountInWords($amount)
{
    return ucwords(Terbilang::make($amount, ' Rupiah'));
}