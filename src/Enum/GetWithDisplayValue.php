<?php

namespace Polygontech\CommonHelpers\Enum;

use Polygontech\CommonHelpers\Misc\Arr;

trait GetWithDisplayValue
{
    public static function withDisplayValues(): array
    {
        return Arr::mapAssoc(function ($key, HasDisplayValue $type) {
            return [$type->value, $type->getDisplayValue()];
        }, self::cases());
    }
}
