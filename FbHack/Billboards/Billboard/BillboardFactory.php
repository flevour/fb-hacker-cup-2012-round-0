<?php

namespace FbHack\Billboards\Billboard;

class BillboardFactory
{
    public function createBillboard()
    {
        return new Billboard();
    }

    public function createText()
    {
        return new Text();
    }

    public function createAlgorithm(Billboard $billboard, Text $text)
    {
        return new Algorithm($billboard, $text);
    }
}
