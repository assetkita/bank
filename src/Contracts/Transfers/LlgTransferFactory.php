<?php

namespace Assetku\BankService\Contracts\Transfers;

use Assetku\BankService\Contracts\Requests\LlgTransferRequest;

interface LlgTransferFactory
{
    /**
     * Create a new llg transfer instance
     *
     * @param  LlgTransferRequest  $request
     * @param  string  $contents
     * @return LlgTransfer
     */
    public function make(LlgTransferRequest $request, string $contents);
}
