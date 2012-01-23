<?php

namespace FbHack\Billboards\Billboard;

class Text
{

    private $text;
    private $size;

    public function setText($text)
    {
        $this->text = $text;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

}
