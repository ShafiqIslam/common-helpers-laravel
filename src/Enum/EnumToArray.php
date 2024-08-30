<?php

namespace Polygontech\CommonHelpers\Enum;

use Polygontech\CommonHelpers\Misc\Arr;
use Illuminate\Support\Arr as IlluminateArr;
use Illuminate\Support\Facades\Lang;

trait EnumToArray
{
    public static function getLangFile(): string
    {
        return 'enum';
    }
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

    public static function toArray(bool $isTranslate = false, string $locale = null): array
    {
        $values = self::values();
        $names = self::names();

        if ($isTranslate) {
            $locale = $locale ?: app()->getLocale();
            $names = array_map(function ($name) use ($locale) {
                return Lang::get(self::getLangFile() . ".$name", [], $locale);
            }, $names);
        }

        return array_combine($values, $names);
    }

    public static function toFlippedArray(bool $isTranslate = false, string $locale = null): array
    {
        $values = self::values();
        $names = self::names();

        if ($isTranslate) {
            $locale = $locale ?: app()->getLocale();
            $names = array_map(function ($name) use ($locale) {
                return Lang::get(self::getLangFile() . ".$name", [], $locale);
            }, $names);
        }

        return array_combine($names, $values);
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
