<?php

namespace G4\Presenter;

use G4\Constants\Http;

class ResponseCode
{

    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return $this->value === Http::CODE_204
            ? Http::CODE_200
            : $this->value;
    }
}