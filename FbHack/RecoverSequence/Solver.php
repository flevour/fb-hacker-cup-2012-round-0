<?php

namespace FbHack\RecoverSequence;

use FbHack\SolverInterface;

class Solver implements SolverInterface
{

    private $debug = '';

    public function getSolutionForLine($line)
    {
        list($n, $sequence) = explode(' ', $line);
        return 2;
    }

    public function getDebugSequence(array $array)
    {
        $this->mergeSort($array);
        return $this->debug;
    }

    public function mergeSort(array $array)
    {
        $n = count($array);
        if ($n <= 1) {
            return $array;
        }
        $mid = floor($n / 2);

        $firstHalf = $this->mergeSort(array_slice($array, 0, $mid));
        $secondHalf = $this->mergeSort(array_slice($array, $mid));
        return $this->merge($firstHalf, $secondHalf);
    }

    private function merge(array $array1, array $array2)
    {
        $result = array();
        while (count($array1) && count($array2)) {
            if ($array1[0] < $array2[0]) {
                $this->debug(1);
                $result[] = array_shift($array1);
            } else {
                $this->debug(2);
                $result[] = array_shift($array2);
            }
        }
        $result = array_merge($result, $array1);
        $result = array_merge($result, $array2);
        return $result;
    }

    private function debug($code)
    {
        $this->debug .= $code;
    }

}