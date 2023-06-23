<?php

namespace Polygontech\CommonHelpers\HTTP;

use Polygontech\CommonHelpers\Exception\ValidationExceptionConverter;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class URLDataCaster implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        try {
            return $this->tryToCast($value);
        } catch (InvalidURL $e) {
            throw ValidationExceptionConverter::forField($e, $property->inputMappedName);
        }
    }

    protected function tryToCast(mixed $value): mixed
    {
        return URL::parse($value);
    }
}
