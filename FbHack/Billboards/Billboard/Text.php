<?php

namespace FbHack\Billboards\Billboard;

class Text
{

    private $text;
    private $size;

    public function __construct($text = null)
    {
        $this->text = $text;
    }

    public function fit(Billboard $billboard, $size)
    {
        $map = array();
        $words = explode(' ', $this->text);
        $line = 1;
        foreach ($words as $word) {
            if (!isset($map[$line])) {
                $map[$line] = array();
            }
            $curLine = $map[$line];
            $curLine[] = strlen($word);
            $curLength = array_sum($curLine) + count($curLine) - 1;
            $maxWidth = ((int) $billboard->getWidth() / $size);
            if ($curLength <= $maxWidth) {
                $map[$line] = $curLine;
            }
            else {
                if (strlen($word) > $maxWidth) {
                    return false;
                }
                $line++;
                $map[$line][] = strlen($word);
            }
        }
        return $line <= ((int) $billboard->getHeight() / $size);
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setSize($size)
    {
        $this->size = $size;
    }

    public function getSize()
    {
        return $this->size;
    }

}
