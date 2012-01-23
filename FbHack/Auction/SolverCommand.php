<?php

namespace FbHack\Auction;

use FbHack\AbstractSolverCommand;

class SolverCommand extends AbstractSolverCommand
{

    protected function getCode()
    {
        return 'auction';
    }

    protected function getCodeName()
    {
        return 'Auction';
    }
}
