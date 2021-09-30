<?php

namespace Dietercoopman\Showsql;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Dietercoopman\Showsql\Showsql
 */
class ShowsqlFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'showsql';
    }
}
