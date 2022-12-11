<?php

namespace Polygontech\CommonHelpers\Enum;

use Polygontech\CommonHelpers\Misc\Arr;

trait GetWithDisplayValue
{
    public static function withDisplayValues(): array
    {
        return self::getDisplayValues(self::cases());
    }

    /**
     * @param array<HasDisplayValue> $cases
     * @return array
     */
    public static function getDisplayValues(array $cases): array
    {
        return Arr::mapAssoc(function ($key, HasDisplayValue $type) {
            return [$type->value, $type->getDisplayValue()];
        }, $cases);
    }
}
