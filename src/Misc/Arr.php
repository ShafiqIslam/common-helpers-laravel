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
}
