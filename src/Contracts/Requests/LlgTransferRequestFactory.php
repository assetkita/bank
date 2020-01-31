<?php

namespace Assetku\BankService\Contracts\Requests;

use Assetku\BankService\Contracts\Subjects\LlgTransferSubject;

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
