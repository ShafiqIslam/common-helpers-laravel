<?php

namespace Polygontech\CommonHelpers\Exception;

use Illuminate\Http\Response;

trait GenericRenderer
{
    public function render(): Response
    {
        return response(['message' => $this->getMessage()], $this->getCode());
    }
}
