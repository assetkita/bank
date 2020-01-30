<?php

namespace Assetku\BankService\Requests\Contracts\Factories;

use Assetku\BankService\Contracts\LlgTransferSubject;
use Assetku\BankService\Requests\Contracts\LlgTransferRequest;

interface LlgTransferRequestFactory
{
    /**
     * Create a new llg transfer request instance
     *
     * @param  LlgTransferSubject  $subject
     * @return LlgTransferRequest
     */
    public function make(LlgTransferSubject $subject);
}
