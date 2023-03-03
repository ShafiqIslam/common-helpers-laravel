<?php

namespace Polygontech\CommonHelpers\Email;

use Exception;
use Throwable;

class InvalidEmail extends Exception
{
    public function __construct(string $message = "This is not an email", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
