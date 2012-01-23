<?php

namespace Test\Billboards\Billboard;

require_once(__DIR__ . '/../../../autoload.php');

use FbHack\Billboards\Billboard\Billboard;

class BillboardTest extends \PHPUnit_Framework_TestCase
{

    public function testFinalSolution()
    {
        $billboard = new Billboard();
        $billboard->setWidth(20);
        $billboard->setHeight(6);
        $this->assertEquals(3, $billboard->solve('hacker cup'));
    }

}
