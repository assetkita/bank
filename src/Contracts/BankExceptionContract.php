<?php

interface BankExceptionContract
{
    /**
     * get translated error from Bank Provider
     * 
     * @param mixed $code
     * @return string
     */
    public function TranslateError($code);
}