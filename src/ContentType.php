<?php

namespace G4\Presenter;

use G4\Constants\Format;
use G4\Constants\ContentType as ContentTypeConst;
use G4\Runner\Presenter\DataTransfer;
use G4\Runner\Presenter\HeaderAccept;

class ContentType
{

    /**
     * @var DataTransfer
     */
    private $dataTransfer;

    /**
     * @var string
     */
    private $format;


    public function __construct($format)
    {
        $this->format = $format;
        $this->validateFormat();
    }

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentTypeMap()[$this->getFormat()];
    }

    /**
     * @return string
     */
    public function getFormat()
    {
        return $this->format;
    }

    public function isCli()
    {
        return \php_sapi_name() === 'cli';
    }

    public function isHttp()
    {
        return !$this->isCli();
    }

    public function makeHeaderAccept()
    {
        return new HeaderAccept();
    }

    /**
     * @return array
     */
    private function contentTypeMap()
    {
        return [
            Format::JSON => ContentTypeConst::JSON,
            Format::TWIG => ContentTypeConst::HTML,
        ];
    }

    /**
     * @throws \Exception
     */
    private function formatFactory()
    {
        $format = $this->dataTransfer->getResponse()->getResponseObjectPart(Format::FORMAT);
        $this->format = $format === null ? $this->headerAccept->getFormat() : $format;
        if (! $this->isFormatValid()) {
            throw new \Exception(600, 'Not valid runner view format!');
        }
    }
}