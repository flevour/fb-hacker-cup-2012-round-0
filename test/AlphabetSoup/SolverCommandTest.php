<?php

require_once(__DIR__ . '/../../autoload.php');

use FbHack\AlphabetSoup\SolverCommand;

class SolverCommandTest extends PHPUnit_Framework_TestCase
{

    public function testFinalSolution()
    {
        $filename = __DIR__ . "/../data/alphabet-soup-1.txt";
        $input = $this->getMockInput();
        $input->expects($this->atLeastOnce())
                ->method('getArgument')
                ->with('input')
                ->will($this->returnValue($filename));
        $output = $this->getMockOutput();
        $output->expects($this->at(0))
                ->method('writeln')
                ->with('Case #1: 1');
        $output->expects($this->at(1))
                ->method('writeln')
                ->with('Case #2: 2');

        $solver = $this->getMockSolver();
        $solver->expects($this->at(0))
                ->method('getSolutionForLine')
                ->with('WELCOME TO FACEBOOK HACKERCUP')
                ->will($this->returnValue(1));
        $solver->expects($this->at(1))
                ->method('getSolutionForLine')
                ->with('CUP WITH LABEL HACKERCUP BELONGS TO HACKER')
                ->will($this->returnValue(2));
        $solverCommand = new SolverCommand($solver);
        $solverCommand->run($input, $output);
    }

    public function testCommandSetup()
    {
        $solver = $this->getMockSolver();
        $solverCommand = new SolverCommand($solver);
        $this->assertEquals($solverCommand->getName(), 'fbhack:alphabet-soup');
        $this->assertEquals($solverCommand->getDescription(), 'Solves problem Alphabet Soup');
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
