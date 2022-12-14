<?php

namespace Polygontech\CommonHelpers\Mobile;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class BDMobileCaster implements CastsAttributes
{

    /**
     * @param $model
     * @param $key
     * @param $value
     * @param $attributes
     * @return BDMobile
     * @throws InvalidBDMobile
     */
    public function get($model, $key, $value, $attributes)
    {
        return new BDMobile($value);
    }

    /**
     * @param $model
     * @param $key
     * @param BDMobile $value
     * @param $attributes
     * @return string
     */
    public function set($model, $key, $value, $attributes)
    {
        return $value->getWithCountryCode();
    }
}
