<?php

namespace StartappTest;

use Startapp\Params;

class ParamsTest extends \PHPUnit_Framework_TestCase
{
    public function testReturnsTheCorrectDate()
    {
        $params = new Params();
        $this->assertSame(date('y'), $params->getDate(), "Expected date not returned");
    }
}
