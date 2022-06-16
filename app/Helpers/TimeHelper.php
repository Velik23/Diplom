<?php

namespace App\Helpers;


class TimeHelper
{
    public static function getTime(string $method, string $message)
    {
        $start = microtime(true);

        return round(microtime(true) - $start,  20);
    }
}