<?php

namespace Polygontech\CommonHelpers\Enum;

trait EnumToArray
{
    public static function names(): array
    {
        return array_column(self::cases(), 'name');
    }

    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function toArray(): array
    {
        return array_combine(self::values(), self::names());
    }

    public static function implode($glue = ','): string
    {
        return implode($glue, self::values());
    }
}
