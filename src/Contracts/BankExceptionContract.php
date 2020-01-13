<?php

namespace Assetku\BankService\Contracts;

interface BankExceptionContract
{
    /**
     * get translated error from Service Provider
     * 
     * @param mixed $code
     * @return string
     */
    public static function translateError($code);
}
