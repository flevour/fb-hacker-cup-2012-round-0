<?php

namespace FbHack\SquishedStatus;
use FbHack\SolverInterface;

class Solver implements SolverInterface
{
    private $maxCode = null;
    private $maxCodeLength = null;
    private $cache = array();

    public function getSolutionForLine($line)
    {
        $this->cache = array();
        list($maxCode, $status) = explode(' ', $line);
        $this->maxCode = (int) $maxCode;
        $this->maxCodeLength = count(str_split($maxCode));
        $split = str_split($status);
        for ($i = count($split) - 1; $i >= 0; $i--) {
            $this->count(array_slice($split, $i));
        }
        return $this->count($split) % 4207849484;
    }

    private function count(array $status) {
        if (count($status) <= 1) {
            return $this->statusIsValid($status);
        }
        if (count($status) >= 2) {
            $cacheKey = $this->cacheKey($status);
            if (isset($this->cache[$cacheKey])) {
                return $this->cache[$cacheKey];
            }
            $count = 0;
            for ($i = 1; $i <= min(count($status), $this->maxCodeLength); $i++) {
                $first = array_slice($status, 0, $i);
                $second = array_slice($status, $i);
                $count += ((int) ($this->statusIsValid($first) * $this->count($second)) % 4207849484);
            }
            $this->cache[$cacheKey] = $count;
            return $count;
        }
    }

    private function statusIsValid(array $status) {
        if (empty($status)) {
            return true;
        }
        // controllare se comincia per zero
        $_status = (int) (implode('', $status));

        $return = $status[0] != 0 && $_status >= 1 && $_status <= $this->maxCode;
        return $return;
    }

    private function cacheKey(array $status) {
        return implode('', $status);
    }
}