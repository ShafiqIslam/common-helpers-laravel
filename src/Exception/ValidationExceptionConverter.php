<?php

namespace Polygontech\CommonHelpers\Exception;

use Exception;

class ValidationExceptionConverter
{
    public static function forField(Exception $e, $field): Exception
    {
        if (class_exists('\Illuminate\Validation\ValidationException')) {
            return \Illuminate\Validation\ValidationException::withMessages([
                $field => $e->getMessage()
            ]);
        } else {
            return $e;
        }
    }
}
