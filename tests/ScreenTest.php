<?php
namespace BEAR\Package\Tests;

use BEAR\Package\ExceptionHandle\Screen;
use Aura\Di\Exception;

class ScreenTest extends \PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        parent::setUp();
        $this->screen = new Screen;
    }

    public function testNew()
    {
        $this->assertInstanceOf('BEAR\Package\ExceptionHandle\Screen', $this->screen);
    }

    public function getTraceAsJsString()
    {
        $trace = new \Exception;
        $string = $this->screen->getTraceAsJsString($trace->getTrace());
        error_log($string);
        $this->assertInternalType('string', $string);
    }

}
