<?php
namespace Test\RecoverSequence;

require_once(__DIR__ . '/../../autoload.php');

use FbHack\RecoverSequence\SolverCommand;

/**
 * @backupGlobals disabled
 */
class SolverCommandTest extends \PHPUnit_Framework_TestCase
{

    public function testFinalSolution()
    {
        $filename = __DIR__ . "/../data/recover-sequence-1.txt";
        $input = $this->getMockInput();
        $input->expects($this->atLeastOnce())
                ->method('getArgument')
                ->with('input')
                ->will($this->returnValue($filename));
        $output = $this->getMockOutput();
        $i = 0;
        $output->expects($this->at($i++))
                ->method('writeln')
                ->with('Case #1: 994');
        $output->expects($this->at($i++))
                ->method('writeln')
                ->with('Case #2: 1024');
        $i = 0;
        $solver = $this->getMockSolver();
        $solver->expects($this->at($i++))
                ->method('getSolutionForLine')
                ->with('2 1')
                ->will($this->returnValue(994));
        $solver->expects($this->at($i++))
                ->method('getSolutionForLine')
                ->with('2 2')
                ->will($this->returnValue(1024));
        $solverCommand = new SolverCommand($solver);
        $solverCommand->run($input, $output);
    }

    private function getMockInput()
    {
        return $this->getMock('Symfony\Component\Console\Input\InputInterface');
    }

    private function getMockOutput()
    {
        return $this->getMock('Symfony\Component\Console\Output\OutputInterface');
    }

    private function getMockSolver()
    {
        return $this->getMock('FbHack\SolverInterface');
    }

}
