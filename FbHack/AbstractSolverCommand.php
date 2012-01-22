<?php

namespace FbHack;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

abstract class AbstractSolverCommand extends Command
{

    public function __construct(SolverInterface $solver)
    {
        $this->solver = $solver;
        parent::__construct();
    }

    protected function configure()
    {
        $this->setName(sprintf('fbhack:%s', $this->getCode()))
                ->setDescription(sprintf('Solves problem %s', $this->getCodeName()))
                ->addArgument('input', InputArgument::REQUIRED)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $input = $input->getArgument('input');
        $contents = file($input);
        // discard first line
        array_shift($contents);
        foreach ($contents as $i => $line) {
            $output->writeln(sprintf('Case #%d: %d', $i + 1, $this->solver->getSolutionForLine(trim($line))));
        }
    }

    abstract protected function getCodeName();
    abstract protected function getCode();
}
