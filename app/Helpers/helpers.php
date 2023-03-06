<?php

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

//Unique Code
function uniqueCode()
{
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
}

function getSerialString($prefix, $number, $subject)
{
    $latest = DB::table('invoices')->latest()->first();

    if (!$latest) {
        return $prefix . $number;
    }

    $string = preg_replace("/[^0-9\.]/", '', $subject);

    return $prefix . sprintf('%06d', $string + 1);
}

function getRandomString()
{
    $characters     = '0123456789';
    $randomString     = "";

    for ($i = 0; $i < 6; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

function getTotal($tax, $subtotal)
{
    $partial = $subtotal * ($tax / 100);
    $total = $partial + $subtotal;
    return $total;
}

function generateUrl($value)
{
    return Str::slug($value);
}

function flagGenerator($value)
{
    $flag = "<span class='fi fi-" . Str::lower($value) . "'></span>";
    return $flag;
}
