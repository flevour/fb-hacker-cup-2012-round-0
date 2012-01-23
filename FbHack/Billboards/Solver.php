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
        $billboard->setWidth($width = array_shift($pieces));
        $billboard->setHeight($height = array_shift($pieces));
        $text = $this->factory->createText();
        $text->setText(implode(' ', $pieces));
        $text->setSize($height);
        return $billboard->solve($text);
    }
}