<?php

namespace FbHack\AlphabetSoup;

use FbHack\AbstractSolverCommand;

class SolverCommand extends AbstractSolverCommand
{

    protected function getCode()
    {
        return 'alphabet-soup';
    }

    protected function getCodeName()
    {
        return 'Alphabet Soup';
    }
}
