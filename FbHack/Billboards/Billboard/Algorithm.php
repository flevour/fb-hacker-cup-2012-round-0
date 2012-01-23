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
        $size = $this->billboard->getHeight();
        return $this->recurse(1, $size);
    }

    private function recurse($min, $max)
    {
        if ($max - $min <= 1) {
            $result = $this->text->fit($this->billboard, $max);
            return ($result) ? $max : $min;
        }
        $size = (int) (($max + $min) / 2);
        $result = $this->text->fit($this->billboard, $size);
        if ($result) {
            return $this->recurse($size, $max);
        }
        else {
            return $this->recurse($min, $size);
        }
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
