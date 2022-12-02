<?php

namespace Polygontech\CommonHelpers\BDMobile;

class BDMobileFormatter
{
    public static function format($number)
    {
        $number = str_replace(" ", "", $number);

        if (preg_match("/^(\+88)/", $number)) return $number;
        if (preg_match("/^(88)/", $number)) return preg_replace('/^88/', '+88', $number);
        if (preg_match("/^([1-9])/", $number)) return '+880' . $number;

        return '+88' . $number;
    }

    public static function formatAux($mobile)
    {
        $mobile = str_replace(" ", "", $mobile);
        $mobile = str_replace("-", "", $mobile);
        if ($mobile[0] == "0") {
            $mobile = "+88" . $mobile;
        }
        return $mobile;
    }

    public static function reverse($mobile)
    {
        if (substr($mobile, 0, 3) === "+88") return substr($mobile, 3, 11);
        if (substr($mobile, 0, 2) === "88") return substr($mobile, 2, 11);
        return $mobile;
    }

    public static function getOriginal($number)
    {
        $number = str_replace(" ", "", $number);
        $number = str_replace("-", "", $number);
        if (preg_match("/^(\+88)/", $number)) {
            return substr($number, 3);
        } elseif (preg_match("/^(88)/", $number)) {
            return substr($number, 2);
        } else {
            return $number;
        }
    }
}
