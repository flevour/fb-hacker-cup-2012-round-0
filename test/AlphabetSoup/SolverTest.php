<?php

require_once(__DIR__ . '/../../autoload.php');

class SolverTest extends PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider dataProviderFinalSolution
     */
    public function testFinalSolution($expectation, $line)
    {
        $solver = new \FbHack\AlphabetSoup\Solver();
        $this->assertEquals($expectation, $solver->getSolutionForLine($line));
    }


    public function dataProviderFinalSolution()
    {
        return array(
            array(2, 'CUP WITH LABEL HACKERCUP BELONGS TO HACKER'),
            array(1, 'WELCOME TO FACEBOOK HACKERCUP'),
            array(1, 'QUICK CUTE BROWN FOX JUMPS OVER THE LAZY DOG'),
            array(0, 'MOVE FAST BE BOLD'),
            array(1, 'HACK THE HACKERCUP'),
        );
    }
}
