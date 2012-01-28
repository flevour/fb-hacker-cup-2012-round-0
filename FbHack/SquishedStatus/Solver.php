<?php

namespace FbHack\SquishedStatus;
use FbHack\SolverInterface;

class Solver implements SolverInterface
{
    private $maxCode = null;
    public function getSolutionForLine($line)
    {
        list($maxCode, $status) = explode(' ', $line);
        $this->maxCode = (int) $maxCode;
        return $this->count(str_split($status)) % 4207849484;
    }

    private function count(array $status) {
        if (count($status) <= 1) {
            return $this->statusIsValid($status);
        }
        if (count($status) >= 2) {
            $count = 0;
            for ($i = 1; $i <= count($status); $i++) {
                $first = array_slice($status, 0, $i);
                $second = array_slice($status, $i);
                $count += (int) ($this->statusIsValid($first) * $this->count($second));
            }
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
}