<?php

namespace FbHack\Auction;

class AuctionFactory
{
    public function createGenerator($n, $p1, $w1, $m, $k, $a, $b, $c, $d)
    {
        return new Generator($n, $p1, $w1, $m, $k, $a, $b, $c, $d);
    }
}
