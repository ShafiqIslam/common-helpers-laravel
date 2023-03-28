<?php

namespace Polygontech\CommonHelpers\Identity;

class BDNidValidator
{
    public static function validate(string $number): bool
    {
        if (!$number) {
            return false;
        }

        return self::checkLength($number);
    }

    public static function isValid(string $number): bool
    {
        return self::validate($number);
    }

    public static function isInvalid(string $number): bool
    {
        return !self::isValid($number);
    }

    private static function checkLength(string $number): bool
    {
        return strlen($number) == 10
            || strlen($number) == 13
            || strlen($number) == 17;
    }

    /**
     * @param string $number
     * @return string
     * @throws InvalidBDNid
     */
    public static function getValidated(string $number): string
    {
        if (!self::validate($number)) throw new InvalidBDNid();

        return $number;
    }
}
