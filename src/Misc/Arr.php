<?php

namespace Polygontech\CommonHelpers\Misc;

class Arr
{
    /**
     * @param callable $f
     * @param array $a
     * @return array
     */
    public static function mapAssoc(callable $f, array $a)
    {
        return array_column(array_map($f, array_keys($a), $a), 1, 0);
    }

    /**
     * @param callable $f
     * @param array $a
     * @return array
     */
    public static function mapToAssocAndPreserveValues(callable $f, array $a)
    {
        return self::mapAssoc(function ($key, $value) use ($f) {
            return [$f($value), $value];
        }, $a);
    }

    /**
     * @param callable $f
     * @param array $a
     * @return array
     */
    public static function mapAssocAndPreserveKeys(callable $f, array $a)
    {
        return self::mapAssoc(function (string $key, $value) use ($f) {
            return [$key, $f($value)];
        }, $a);
    }
}
