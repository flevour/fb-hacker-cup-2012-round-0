<?php

namespace FbHack\Billboards;

use FbHack\AbstractSolverCommand;

class SolverCommand extends AbstractSolverCommand
{

    protected function getCode()
    {
        return 'billboards';
    }

    protected function getCodeName()
    {
        return 'Billboards';
    }
}
