<?php

namespace G4\Presenter;

class Formatter
{

    private $responseModel;


    public function __construct(ResponseModel $responseModel)
    {
        $this->responseModel = $responseModel;
    }

    public function format()
    {
        return [
            'code' => null,
            'message' => null,
            'response' => null,
            'request' => [
                'type' => null,
                'service' => null,
                'method' => null,
                'params' => null,
                'headers' => null,
                'cookies' => null,
            ],
            'debug' => [
                'code'  => null,
                'message' => null,
                'file' => null,
                'line' => null,
                'trace' => null,
            ],
            'profiler' => [
                'total_elapsed_time' => null,
                'parts' => null
            ],
        ];
    }
}