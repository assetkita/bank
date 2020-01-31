<?php

namespace Assetku\BankService\Contracts\Requests;

use Assetku\BankService\Contracts\Subjects\OnlineTransferSubject;

interface OnlineTransferRequestFactory
{
    /**
     * Create a new online transfer request instance
     *
     * @param  OnlineTransferSubject  $subject
     * @return OnlineTransferRequest
     */
    public function make(OnlineTransferSubject $subject);
}
