<?php

namespace Polygontech\CommonHelpers\Mobile;

use Exception;
use Throwable;
use Polygontech\CommonHelpers\Misc\GenericExceptionRenderer;

class InvalidBDMobile extends Exception
{
    use GenericExceptionRenderer;

    public function __construct(string $message = "This is not a Bangladeshi Mobile Number", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
