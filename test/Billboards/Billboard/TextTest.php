<?php

namespace Test\Billboards\Billboard;

require_once(__DIR__ . '/../../../autoload.php');

use FbHack\Billboards\Billboard\Billboard;
use FbHack\Billboards\Billboard\Text;

class TextTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider dataProviderFit
     */
    public function testFit($width, $height, $text, $size, $expectation)
    {
        $billboard = new Billboard();
        $billboard->setWidth($width);
        $billboard->setHeight($height);
        $text = new Text($text);
        $this->assertEquals($expectation, $text->fit($billboard, $size));
    }

    public function dataProviderFit()
    {
        return array(
            array(10, 1, 'hacker cup', 1, true),
            array(20, 2, 'hacker cup', 2, true),
            array(10, 1, 'hacker cups', 1, false),
            array(10, 1, 'hacker cup', 2, false),
            array(10, 20, 'MUST BE ABLE TO HACK', 3, false),
        );
    }
}
