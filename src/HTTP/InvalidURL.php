<?php

namespace Polygontech\CommonHelpers\HTTP;

use Exception;
use Polygontech\CommonHelpers\Exception\GenericRenderer;
use Throwable;

class InvalidURL extends Exception
{
    use GenericRenderer;

    public function __construct(
        string $message = "Invalid Url.",
        int $code = 400,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
