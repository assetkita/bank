<?php

namespace Assetku\BankService\Facades;

use Illuminate\Support\Facades\Facade;

class Bank extends Facade
{
    /**
     * Initiate a mock expectation on the facade.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'assetkita.bank';
    }   
}
