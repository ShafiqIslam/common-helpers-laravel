<?php

namespace Polygontech\CommonHelpers\Mobile;

class BDMobileValidator
{
    public static function validate(string $number): bool
    {
        if (!$number) {
            return false;
        }

        $number = BDMobileFormatter::format($number);
        return self::isBangladeshiNumberFormat($number);
    }

    public static function isValid(string $number): bool
    {
        return self::validate($number);
    }

    public static function isInvalid(string $number): bool
    {
        return !self::isValid($number);
    }

    private static function isBangladeshiNumberFormat(string $number): bool
    {
        return self::contains88($number)
            && strlen($number) == 14
            && $number[4] == '1'
            && self::inBdNumberDomain($number);
    }

    private static function contains88(string $number): bool
    {
        return str_starts_with($number, '+880');
    }

    private static function inBdNumberDomain(string $number): bool
    {
        return in_array($number[5], [3, 4, 5, 6, 7, 8, 9]);
    }

    /**
     * @param string $number
     * @return string
     * @throws InvalidMobile
     */

    public static function getValidated(string $number): string
    {
        if (!self::validate($number)) throw new InvalidBDMobile();

        return BDMobileFormatter::format($number);
    }
}
