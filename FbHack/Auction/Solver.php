<?php

namespace FbHack\Auction;

use FbHack\SolverInterface;

class Solver implements SolverInterface
{

    private $factory = null;

    public function __construct(Auction$factory)
    {
        $this->factory = $factory;
    }

    public function getSolutionForLine($line)
    {
        $args = explode(' ', $line);
        $generator = call_user_func_array(array($this->factory, 'createGenerator'), $args);
        $listByPrice = new ProductListByPrice();
        $listByWeight = new ProductListByWeight();
        while ($product = $generator->generate()) {
            $listByPrice->insert($product);
            $listByWeight->insert($product);
        }
    }

}