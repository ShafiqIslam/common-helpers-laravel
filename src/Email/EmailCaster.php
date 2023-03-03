<?php

namespace Polygontech\CommonHelpers\Email;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class EmailCaster implements CastsAttributes
{

    /**
     * @param $model
     * @param $key
     * @param $value
     * @param $attributes
     * @return Email
     * @throws InvalidEmail
     */
    public function get($model, $key, $value, $attributes)
    {
        return new Email($value);
    }

    /**
     * @param $model
     * @param $key
     * @param Email $value
     * @param $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return $value->toString();
    }
}
