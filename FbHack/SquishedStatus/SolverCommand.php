<?php

namespace FbHack\SquishedStatus;

use FbHack\AbstractSolverCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SolverCommand extends AbstractSolverCommand
{

    protected function getCode()
    {
        return 'squished-status';
    }

    protected function getCodeName()
    {
        return 'Squished Status';
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $input = $input->getArgument('input');
        $contents = file($input);
        // discard first line
        array_shift($contents);
        $cases = 1;
        $line = array();
        foreach ($contents as $i => $token) {
            $line[] = trim($token);
            if (strpos($token, ' ') === false) { // non contiene spazio
                if (count($line) == 1) {
                    continue;
                }
            }
            $output->writeln(sprintf('Case #%d: %d', $cases, $this->solver->getSolutionForLine(trim(implode(' ', $line)))));
            $line = array();
            $cases++;
        }
    }

}
