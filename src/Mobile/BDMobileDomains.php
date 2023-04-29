<?php

namespace Polygontech\CommonHelpers\Mobile;

use Polygontech\CommonHelpers\Enum\EnumToArray;

enum BDMobileDomains: int
{
    use EnumToArray;

    case GP1 = 7;
    case GP2 = 3;
    case BL1 = 9;
    case BL2 = 4;
    case AIRTEL = 6;
    case ROBI = 8;
    case TELETALK = 5;

    private static function getDomainCharacterFromString(string $number): int
    {
        return intval($number[5]);
    }

    public static function getDomainCharacter(BDMobile $mobile): int
    {
        return self::getDomainCharacterFromString($mobile->getWithCountryCode());
    }

    public static function isValidDomain(string $number): bool
    {
        return in_array(self::getDomainCharacterFromString($number), self::values());
    }

    public static function isGp(BDMobile $mobile): bool
    {
        $char = self::getDomainCharacter($mobile);
        return self::GP1 === $char || self::GP2 === $char;
    }

    public static function isBanglalink(BDMobile $mobile): bool
    {
        $char = self::getDomainCharacter($mobile);
        return self::BL1 === $char || self::BL2 === $char;
    }

    public static function isRobi(BDMobile $mobile): bool
    {
        $char = self::getDomainCharacter($mobile);
        return self::ROBI === $char;
    }

    public static function isAirtel(BDMobile $mobile): bool
    {
        $char = self::getDomainCharacter($mobile);
        return self::AIRTEL === $char;
    }

    public static function isTeletalk(BDMobile $mobile): bool
    {
        $char = self::getDomainCharacter($mobile);
        return self::TELETALK === $char;
    }
}
