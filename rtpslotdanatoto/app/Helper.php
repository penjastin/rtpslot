<?php
use App\Models\Sitelist;

if (!function_exists('getSetting')) {
    function getSetting() {
        return Sitelist::where('site_name', env('AGENT'))->first();
    }
}