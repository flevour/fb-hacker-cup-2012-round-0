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

    public function testMergeSort()
    {
        $solver = new \FbHack\RecoverSequence\Solver();
        $this->assertEquals(array(1, 2, 3, 4), $solver->mergeSort(array(2, 4, 3, 1)));

    }
    public function testMergeSortDebugSequence()
    {
        $solver = new \FbHack\RecoverSequence\Solver();
        $this->assertEquals("12212", $solver->getDebugSequence(array(2, 4, 3, 1)));
    }

    public function dataProviderFinalSolution()
    {
        return array(
            array(2, '2 1')
        );
    }

}
