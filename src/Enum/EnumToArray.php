<?php

namespace Polygontech\CommonHelpers\Enum;

use Polygontech\CommonHelpers\Misc\Arr;
use Illuminate\Support\Arr as IlluminateArr;

trait EnumToArray
{
    public static function all(): array
    {
        return self::cases();
    }

    public static function allAsAssoc(): array
    {
        return Arr::mapToAssocAndPreserveValues(fn ($item) => $item->name, self::cases());
    }

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

    public static function toFlippedArray(): array
    {
        return array_combine(self::names(), self::values());
    }

    public static function implode($glue = ','): string
    {
        return implode($glue, self::values());
    }

    public static function except($item): array
    {
        if (!is_array($item)) $item = [$item];

        $names = array_map(fn ($x) => $x->name, $item);

        return array_values(IlluminateArr::except(self::allAsAssoc(), $names));
    }
}
