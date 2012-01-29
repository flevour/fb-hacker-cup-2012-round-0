<?php

namespace FbHack\RecoverSequence;

use FbHack\SolverInterface;

class Solver implements SolverInterface
{

    private $debug = '';
    private $recoverSequence = '';

    public function getSolutionForLine($line)
    {
        list($n, $sequence) = explode(' ', $line);
        $this->recoverSequence = str_split($sequence);
        $sorted = $this->mergeSort(range(1, $n), 'inverseMerge');
        $solution = array_combine($sorted, range(1, $n));
        ksort($solution);
        return $this->checksum($solution);
    }

    private function checksum(array $array)
    {
        $result = 1;
        foreach ($array as $element) {
            $result = (31 * $result + (int) $element) % 1000003;
        }
        return $result;
    }

    public function getDebugSequence(array $array)
    {
        $this->debug = '';
        $this->mergeSort($array);
        return $this->debug;
    }

    public function mergeSort(array $array, $function = 'merge')
    {
        $n = count($array);
        if ($n <= 1) {
            return $array;
        }
        $mid = floor($n / 2);

        $firstHalf = $this->mergeSort(array_slice($array, 0, $mid), $function);
        $secondHalf = $this->mergeSort(array_slice($array, $mid), $function);
        return call_user_func(array($this, $function), $firstHalf, $secondHalf);
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

    private function inverseMerge(array $array1, array $array2)
    {
        $result = array();
        while (count($array1) && count($array2)) {
            $step = array_shift($this->recoverSequence);
            if ($step == 1) {
                $result[] = array_shift($array1);
            } else {
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