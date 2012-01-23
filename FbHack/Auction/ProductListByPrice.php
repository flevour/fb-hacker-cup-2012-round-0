<?php

namespace FbHack\Auction;

class ProductListByPrice extends \SplMaxHeap
{

    function compare($a, $b)
    {
        return $a->getPrice() - $b->getPrice();
    }

}