<?php

namespace Test\RecoverSequence;

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
        $solver = new \FbHack\RecoverSequence\Solver();
        $this->assertEquals($expectation, $solver->getSolutionForLine($line));
    }

    /**
     * @dataProvider dataProviderMergeSort
     */
    public function testMergeSort($expectation, $input, $function = 'merge')
    {
        $solver = new \FbHack\RecoverSequence\Solver();
        $this->assertEquals($expectation, $solver->mergeSort($input, $function));
    }

    public function dataProviderMergeSort()
    {
        return array(
            array(range(1, 4), array(2, 4, 3, 1)),
        );
    }

    public function testMergeSortDebugSequence()
    {
        $solver = new \FbHack\RecoverSequence\Solver();
        $this->assertEquals("12212", $solver->getDebugSequence(array(2, 4, 3, 1)));
    }

    public function dataProviderFinalSolution()
    {
        return array(
            array(994, '2 1'),
            array(1024, '2 2'),
            array(987041, '4 12212'),
            array(570316, '5 1122211'),
            array(940812, '10 121221212111122121212'),
        );
    }

}
