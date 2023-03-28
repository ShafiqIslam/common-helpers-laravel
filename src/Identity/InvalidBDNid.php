<?php

namespace Polygontech\CommonHelpers\Identity;

use Exception;
use Throwable;

class InvalidBDNid extends Exception
{
    public function __construct(string $message = "This is not a Bangladeshi Nid Number", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
