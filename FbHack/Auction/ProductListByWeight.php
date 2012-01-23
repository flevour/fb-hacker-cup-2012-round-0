<?php

namespace FbHack\Auction;

class ProductListByWeight extends \SplMaxHeap
{

    function compare($a, $b)
    {
        return $a->getWeigth() - $b->getWeigth();
    }

}