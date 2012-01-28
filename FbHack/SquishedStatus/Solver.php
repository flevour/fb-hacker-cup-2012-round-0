<?php

namespace FbHack\SquishedStatus;
use FbHack\SolverInterface;

class Solver implements SolverInterface
{
    public function getSolutionForLine($line)
    {
        $letters = array('H', 'A', 'C', 'K', 'E', 'R', 'U', 'P');
        $counter = array();
        // setup
        foreach ($letters as $char) {
            $counter[$char] = 0;
        }
        foreach (str_split($line) as $char) {
            if (in_array($char, $letters)) {
                $value = 1;
                if ($char == 'C') {
                    // I need 2 C's to form HACKERCUP
                    $value = 0.5;
                }
                $counter[$char] += $value;
            }
        }
        return floor(min($counter));
    }
}