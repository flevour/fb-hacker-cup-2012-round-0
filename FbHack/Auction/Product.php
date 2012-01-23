<?php

namespace FbHack\Auction;

class Product
{
    private $price, $weight;

    public function __construct($price, $weight)
    {
        $this->price = $price;
        $this->weight = $weight;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function toString()
    {
        return sprintf('%s,%s', $this->price, $this->weight);
    }
}
