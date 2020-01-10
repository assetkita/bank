<?php

namespace Assetku\BankService\Contracts;

interface BankExceptionContract
{
    /**
     * get translated error from BankProvider Provider
     * 
     * @param mixed $code
     * @return string
     */
    public static function TranslateError($code);
}
