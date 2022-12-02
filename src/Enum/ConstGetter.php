<?php

namespace Polygontech\CommonHelpers\Enum;

use ReflectionClass;
use Polygontech\CommonHelpers\Misc\Str;

/**
 * This trait is for enum like class constants.
 * From php 8, Enums are good choice now.
 */
trait ConstGetter
{
    public static function getWithKeys()
    {
        $class = new ReflectionClass(static::class);
        return $class->getConstants();
    }

    public static function get()
    {
        return array_values(static::getWithKeys());
    }

    public static function getAllWithout(...$excludes)
    {
        if (is_array($excludes[0])) {
            $excludes = $excludes[0];
        }
        return array_diff(static::get(), $excludes);
    }

    public static function getWithMadeKeys()
    {
        $result = [];
        foreach (static::get() as $item) {
            $result[$item] = Str::normalize($item);
        }
        return $result;
    }

    public static function isValid($value)
    {
        return in_array($value, static::get());
    }

    public static function isInvalid($value)
    {
        return !static::isValid($value);
    }

    public static function implode($glue = ',')
    {
        return implode($glue, static::get());
    }
}
