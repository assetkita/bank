<?php

namespace Assetku\BankService\Requests\Contracts\Factories;

use Assetku\BankService\Contracts\OnlineTransferSubject;
use Assetku\BankService\Requests\Contracts\OnlineTransferRequest;

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
