<?php

namespace Polygontech\CommonHelpers\Misc;

use Illuminate\Support\Str as LaravelStr;

class Str
{
    /**
     * Make a string normal from case formattings like : snake_case, camelCase.
     *
     * @param string $value
     * @return string
     */
    public static function normalize(string $value)
    {
        return implode(' ', LaravelStr::ucsplit(LaravelStr::studly($value)));
    }

    /**
     * @param $string
     * @param string $separator
     * @param array $keep
     * @return string|string[]|null
     */
    public static function clean($string, $separator = "-", $keep = [])
    {
        $string    = str_replace(' ', $separator, $string); // Replaces all spaces with hyphens.
        $keep_only = "/[^A-Za-z0-9";
        foreach ($keep as $item) {
            $keep_only .= "$item";
        }
        $keep_only .= (($separator == '-') ? '\-' : "_");
        $keep_only .= "]/";
        $string    = preg_replace($keep_only, '', $string);           // Removes special chars.
        return preg_replace("/$separator+/", $separator, $string);    // Replaces multiple hyphens with single one.
    }
}
