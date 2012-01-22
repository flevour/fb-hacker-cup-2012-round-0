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
        $this->markTestIncomplete();
        $solver = new \FbHack\Billboards\Solver();
        $this->assertEquals($expectation, $solver->getSolutionForLine($line));
    }


    public function dataProviderFinalSolution()
    {
        return array(
            array(0, ''),
        );
    }
}
