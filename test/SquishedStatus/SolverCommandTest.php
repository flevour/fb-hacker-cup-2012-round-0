<?php
namespace Test\SquishedStatus;

require_once(__DIR__ . '/../../autoload.php');

use FbHack\SquishedStatus\SolverCommand;

/**
 * @backupGlobals disabled
 */
class SolverCommandTest extends \PHPUnit_Framework_TestCase
{

    public function testFinalSolution()
    {
        $filename = __DIR__ . "/../data/squished-status-1.txt";
        $input = $this->getMockInput();
        $input->expects($this->atLeastOnce())
                ->method('getArgument')
                ->with('input')
                ->will($this->returnValue($filename));
        $output = $this->getMockOutput();
        $i = 0;
        $output->expects($this->at($i++))
                ->method('writeln')
                ->with('Case #1: 2');
        $output->expects($this->at($i++))
                ->method('writeln')
                ->with('Case #2: 4');
        $output->expects($this->at($i++))
                ->method('writeln')
                ->with('Case #3: 0');
        $output->expects($this->at($i++))
                ->method('writeln')
                ->with('Case #4: 6');
        $output->expects($this->at($i++))
                ->method('writeln')
                ->with('Case #5: 2');

        $i = 0;
        $solver = $this->getMockSolver();
        $solver->expects($this->at($i++))
                ->method('getSolutionForLine')
                ->with('12 12')
                ->will($this->returnValue(2));
        $solver->expects($this->at($i++))
                ->method('getSolutionForLine')
                ->with('255 219')
                ->will($this->returnValue(4));
        $solver->expects($this->at($i++))
                ->method('getSolutionForLine')
                ->with('30 1234321')
                ->will($this->returnValue(0));
        $solver->expects($this->at($i++))
                ->method('getSolutionForLine')
                ->with('2 101')
                ->will($this->returnValue(6));
        $solver->expects($this->at($i++))
                ->method('getSolutionForLine')
                ->with('70 8675309')
                ->will($this->returnValue(2));
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
