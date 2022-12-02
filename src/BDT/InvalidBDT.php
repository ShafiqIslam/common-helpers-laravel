<?php

namespace Polygontech\CommonHelpers\BDT;

use Exception;
use Throwable;

class InvalidBDT extends Exception
{
    public function __construct(string $message = "Invalid Bangladeshi Taka", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
