<?php

namespace Test\SquishedStatus;

require_once(__DIR__ . '/../../autoload.php');

/**
 * @backupGlobals disabled
 */
class SolverTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider dataProviderFinalSolution
     * @param type $expectation
     * @param type $line
     */
    public function testFinalSolution($expectation, $line)
    {

        $solver = new \FbHack\SquishedStatus\Solver();
        $this->assertEquals($expectation, $solver->getSolutionForLine($line));
    }

    public function testModulo() {
        $this->assertEquals(1, 4207849485 % 4207849484);
        $this->assertEquals(1, count(array_filter(array(0, 0, 1))));
    }

    public function dataProviderFinalSolution()
    {
        return array(
            array(2, '12 12'), // valid '1 2', 12
            array(1, '11 12'), // valid '1 2'
            array(3, '11 111'), // valid '1 1 1', '1 11', '11 1', non valid '111'
            array(2, '11 112'), // valid '1 1 2', '11 2', non valid '1 12', '111'

            array(4, '255 219'), // valid '2 1 9', '21 9', '2 19', '219'
            array(3, '218 219'), // valid '2 1 9', '21 9', '2 19', no '219'

            array(0, '2 101'), // not valid '1 01', '1 0 1', '10 1'
        );
    }

}
