<?php

namespace Test\Billboards\Billboard;

require_once(__DIR__ . '/../../../autoload.php');

use FbHack\Billboards\Billboard\Billboard;
use FbHack\Billboards\Billboard\Text;
use FbHack\Billboards\Billboard\Algorithm;

class AlgorithmTest extends \PHPUnit_Framework_TestCase
{

    public function testSolve()
    {
        $this->billboard = $this->getMock('FbHack\Billboards\Billboard\Billboard');
        $this->billboard->expects($this->once())
                ->method('getHeight')
                ->will($this->returnValue(6));
        $this->text = $this->getMock('FbHack\Billboards\Billboard\Text');
        $algorithm = new Algorithm($this->billboard, $this->text);
        $sizes = array(
            array(3, true),
            array(4, true),
            array(5, true),
            array(6, true),
        );
        $this->expectationSequence($sizes);
        $this->assertEquals(6, $algorithm->solve());
    }

    private function expectationSequence(array $sizes)
    {
        foreach ($sizes as $i => $size)
            $this->text->expects($this->at($i))
                    ->method('fit')
                    ->with($this->billboard, $size[0])
                    ->will($this->returnValue($size[1]));
    }

}
