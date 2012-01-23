<?php

namespace Test\Billboards\Billboard;

require_once(__DIR__ . '/../../../autoload.php');

use FbHack\Billboards\Billboard\Billboard;
use FbHack\Billboards\Billboard\Text;

class TextTest extends \PHPUnit_Framework_TestCase
{

    public function testFit()
    {
        $billboard = new Billboard();
        $billboard->setWidth(10);
        $billboard->setHeight(1);
        $text = new Text('hacker cup');
        $this->assertEquals(true, $text->fit($billboard, 1));
    }

}
