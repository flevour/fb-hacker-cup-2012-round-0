<?php

require_once(__DIR__ . '/autoload.php');

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

$console = new Application();


$console->add(new \FbHack\AlphabetSoup\SolverCommand(new \FbHack\AlphabetSoup\Solver()));
$console->add(new \FbHack\Billboards\SolverCommand(new \FbHack\Billboards\Solver(new FbHack\Billboards\Billboard\BillboardFactory)));

$console->run();
