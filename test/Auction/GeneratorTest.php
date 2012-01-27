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
        $i = 1;
        while ($product = $generator->generate()) {
            $this->assertEquals($expectations[$i], $product->toString());
            $i++;
        }
    }

    public function testSecond()
    {
        $generator = new \FbHack\Auction\Generator(13, 5, 7, 5, 9, 1, 3, 2, 5);
        while ($product = $generator->generate()) {
            printf("%s\n", $product->toString());
        }
    }
}
