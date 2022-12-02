<?php

namespace Polygontech\CommonHelpers\Enum;

use Illuminate\Support\Str;

trait StudlyDisplayValue
{
    public function getDisplayValue(): string
    {
        return implode(' ', Str::ucsplit(Str::studly($this->value)));
    }
}
