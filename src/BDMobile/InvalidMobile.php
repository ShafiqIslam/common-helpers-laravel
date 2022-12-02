<?php

namespace Polygontech\CommonHelpers\BDMobile;

use Exception;
use Throwable;

class InvalidMobile extends Exception
{
    public function __construct(string $message = "This is not a Bangladeshi Mobile Number", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
