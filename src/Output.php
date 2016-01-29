<?php

namespace G4\Presenter;

use G4\Presenter\View\ViewInterface;
use G4\Presenter\ContentType;
use G4\Presenter\ResponseCode;
use G4\Http\Response;

class Output
{


    /**
     * @var ContentType
     */
    private $contentType;


    /**
     * @var ResponseCode
     */
    private $responseCode;

    /**
     * @var ViewInterface
     */
    private $view;


    /**
     * @param ViewInterface $view
     * @param ContentType $contentType
     */
    public function __construct(ViewInterface $view, ContentType $contentType, ResponseCode $responseCode)
    {
        $this->view         = $view;
        $this->contentType  = $contentType;
        $this->responseCode = $responseCode;
    }

    public function render()
    {
        if ($this->contentType->isCli()) {
            $this->renderCli();
        }
        if ($this->contentType->isHttp()) {
            $this->renderHttp();
        }
    }

    /**
     * @return Response
     */
    public function makeHttpResponse()
    {
        return new Response();
    }

    private function renderCli()
    {
        echo $this->view->getBody();
    }

    private function renderHtml()
    {
        $this->makeHttpResponse()
            ->setHttpResponseCode((string) $this->responseCode)
            ->setBody($this->body)
            ->setHeader('Content-Type', $this->contentType->getContentType(), true)
            ->sendHeaders()
            ->sendResponse();
    }
}