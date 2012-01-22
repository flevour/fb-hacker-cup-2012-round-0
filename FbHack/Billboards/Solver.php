<?php

namespace FbHack\Billboards;
use FbHack\SolverInterface;
use FbHack\Billboards\Billboard\BillboardFactory;

class Solver implements SolverInterface
{
    private $factory = null;

    public function __construct(BillboardFactory $factory)
    {
        $this->factory = $factory;
    }

    public function getSolutionForLine($line)
    {
        $billboard = $this->factory->createBillboard();
        $pieces = explode(' ', $line);
        $billboard->setWidth(array_shift($pieces));
        $billboard->setHeight(array_shift($pieces));
        return $billboard->solve(implode(' ', $pieces));
    }
}