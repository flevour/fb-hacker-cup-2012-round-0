<?php

namespace FbHack;

interface SolverInterface
{
    public function getName();
    public function getCodeName();
    public function getSolutionForLine($line);
}