<?php

namespace Assetku\BankService\Contracts\Transfers;

use Assetku\BankService\Contracts\Requests\OnlineTransferRequest;

interface OnlineTransferFactory
{
    /**
     * Create a new online transfer instance
     *
     * @param  OnlineTransferRequest  $request
     * @param  string  $contents
     * @return OnlineTransfer
     */
    public function make(OnlineTransferRequest $request, string $contents);
}
