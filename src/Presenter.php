<?php

namespace G4\Presenter;

use G4\Presenter\ResponseModel;
use G4\Presenter\ContentType;
use G4\Presenter\Formatter;
use G4\Presenter\Output;

class Presenter
{

    /**
     * @var ContentType
     */
    private $contentType;

    /**
     * @var Formatter
     */
    private $formatter;


    /**
     * @param Formatter $formatter
     * @param ContentType $contentType
     */
    public function __construct(Formatter $formatter, ContentType $contentType)
    {
        $this->formatter     = $responseFormatter;
        $this->contentType   = $contentType;
    }

    public function render()
    {
        return $this->makeOutput()->render();
    }

    public function makeOutput()
    {
        return new Output();
    }
}