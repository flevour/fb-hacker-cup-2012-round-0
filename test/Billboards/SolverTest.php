<?php

namespace Test\Billboards;

require_once(__DIR__ . '/../../autoload.php');

class SolverTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider dataProviderFinalSolution
     */
    public function testFinalSolution($expectation, $line)
    {
        $billboard = $this->getMock('\FbHack\Billboards\Billboard\Billboard');
        $billboard->expects($this->once())
                ->method('setWidth')
                ->with(20);
        $billboard->expects($this->once())
                ->method('setHeight')
                ->with(6);
        $billboard->expects($this->once())
                ->method('solve')
                ->with('hacker cup')
                ->will($this->returnValue($expectation));
        $billboardFactory = $this->getMock('\FbHack\Billboards\Billboard\BillboardFactory');
        $billboardFactory->expects($this->once())
                ->method('createBillboard')
                ->will($this->returnValue($billboard));
        $solver = new \FbHack\Billboards\Solver($billboardFactory);
        $this->assertEquals($expectation, $solver->getSolutionForLine($line));
    }

    public function dataProviderFinalSolution()
    {
        return array(
            array(3, '20 6 hacker cup'),
//            array(10, '100 20 hacker cup 2013'),
//            array(2, '10 20 MUST BE ABLE TO HACK'),
//            array(8, '55 25 Can you hack'),
//            array(7, '100 20 Hack your way to the cup'),
        );
    }

}
