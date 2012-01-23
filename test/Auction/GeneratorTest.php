<?php

namespace Test\Auction;

require_once(__DIR__ . '/../../autoload.php');

class GeneratorTest extends \PHPUnit_Framework_TestCase
{

    public function testGeneration()
    {
        $n = 5;
        $p1 = 1;
        $w1 = 4;
        $m = 5;
        $k = 7;
        $a = 1;
        $b = 0;
        $c = 1;
        $d = 2;
        $generator = new \FbHack\Auction\Generator($n, $p1, $w1, $m, $k, $a, $b, $c, $d);
        $expectations = array(
            1 => "1,4",
            2 => "2,7",
            3 => "3,3",
            4 => "4,6",
            5 => "5,2",
        );
        for ($i = 1; $i <= 5; $i++) {
            $this->assertEquals($expectations[$i], $generator->generate()->toString());
        }
    }

}
