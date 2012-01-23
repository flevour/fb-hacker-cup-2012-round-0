<?php

namespace FbHack\Billboards\Billboard;

class Algorithm
{

    private $billboard;
    private $text;

    public function __construct(Billboard $billboard, Text $text)
    {
        $this->billboard = $billboard;
        $this->text = $text;
    }

    public function solve()
    {
        return 3;
    }

    public function setBillboard(Billboard $billboard)
    {
        $this->billboard = $billboard;
    }

    public function setText(Text $text)
    {
        $this->text = $text;
    }

}
