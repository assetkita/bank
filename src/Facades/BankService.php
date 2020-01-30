<?php

namespace Assetku\BankService\Facades;

use Illuminate\Support\Facades\Facade;

class BankService extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'bank';
    }   
}
