<?php

namespace Polygontech\CommonHelpers\Misc;

use Illuminate\Http\Response;

trait GenericExceptionRenderer
{
    public function render(): Response
    {
        return response(['message' => $this->getMessage()], $this->getCode());
    }
}
