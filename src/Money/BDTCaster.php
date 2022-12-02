<?php

namespace Polygontech\CommonHelpers\Money;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class BDTCaster implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return Money
     */
    public function get($model, $key, $value, $attributes)
    {
        return BDT::fromDecimal($value);
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  Money  $value
     * @param  array  $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return $value->toDecimal();
    }
}
