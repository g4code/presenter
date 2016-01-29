<?php

use G4\Presenter\Presenter;

class PresenterTest extends \PHPUnit_Framework_TestCase
{

    private $presenter;

    protected function setUp()
    {
        $formatter

        $this->presenter = new Presenter();

    }

    protected function tearDown()
    {
        $this->presenter = null;
    }

    public function testRender()
    {
        $this->presenter->render();
    }
}