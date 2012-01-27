<?php

namespace FbHack\Auction;

/**
 * Description of Generator
 *
 * @author flevour
 */
class Generator
{

    private $n, $p1, $w1, $m, $k, $a, $b, $c, $d, $current;

    public function __construct($n = null, $p1 = null, $w1 = null, $m = null, $k = null, $a = null, $b = null, $c = null, $d = null)
    {
        $this->n = $n;
        $this->p1 = $p1;
        $this->w1 = $w1;
        $this->m = $m;
        $this->k = $k;
        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
        $this->d = $d;

        $this->current = new Product($this->p1, $this->w1);
        $this->index = 1;
    }

    public function generate()
    {
        if ($this->index == $this->n) {
            return false;
        }
        $product = $this->current;
        $price = (($this->a * $product->getPrice() + $this->b) % $this->m) + 1;
        $weight = (($this->c * $product->getWeight() + $this->d) % $this->k) + 1;
        $this->current = new Product($price, $weight);
        $this->index++;
        return $product;
    }

}
