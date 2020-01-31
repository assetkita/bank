<?php

namespace Assetku\BankService\Contracts\Requests;

use Assetku\BankService\Contracts\Subjects\RtgsTransferSubject;

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
