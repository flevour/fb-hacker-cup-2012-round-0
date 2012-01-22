<?php
namespace Test\Billboards;

require_once(__DIR__ . '/../../autoload.php');


use FbHack\Billboards\SolverCommand;

class SolverCommandTest extends \PHPUnit_Framework_TestCase
{

    public function testFinalSolution()
    {
        $filename = __DIR__ . "/../data/billboards-1.txt";
        $input = $this->getMockInput();
        $input->expects($this->atLeastOnce())
                ->method('getArgument')
                ->with('input')
                ->will($this->returnValue($filename));
        $output = $this->getMockOutput();
        $output->expects($this->at(0))
                ->method('writeln')
                ->with('Case #1: 3');
        $output->expects($this->at(1))
                ->method('writeln')
                ->with('Case #2: 10');

        $solver = $this->getMockSolver();
        $solver->expects($this->at(0))
                ->method('getSolutionForLine')
                ->with('20 6 hacker cup')
                ->will($this->returnValue(3));
        $solver->expects($this->at(1))
                ->method('getSolutionForLine')
                ->with('100 20 hacker cup 2013')
                ->will($this->returnValue(10));
        $solverCommand = new SolverCommand($solver);
        $solverCommand->run($input, $output);
    }

    public function testCommandSetup()
    {
        $solver = $this->getMockSolver();
        $solverCommand = new SolverCommand($solver);
        $this->assertEquals($solverCommand->getName(), 'fbhack:billboards');
        $this->assertEquals($solverCommand->getDescription(), 'Solves problem Billboards');
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
