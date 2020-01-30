<?php

namespace Assetku\BankService\Requests\Contracts\Factories;

use Assetku\BankService\Contracts\RtgsTransferSubject;
use Assetku\BankService\Requests\Contracts\RtgsTransferRequest;

interface RtgsTransferRequestFactory
{
    /**
     * Create a new rtgs transfer request instance
     *
     * @param  RtgsTransferSubject  $subject
     * @return RtgsTransferRequest
     */
    public function make(RtgsTransferSubject $subject);
}
