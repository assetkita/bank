<?php

namespace Assetku\BankService\Contracts\LlgTransfer;

use Assetku\BankService\Contracts\Subjects\LlgTransferSubject;

interface LlgTransferFactoryContract
{
    /**
     * Create a new llg transfer request instance
     *
     * @param  LlgTransferSubject  $subject
     * @return LlgTransferRequestContract
     */
    public function makeRequest(LlgTransferSubject $subject);

    /**
     * Create a new llg transfer response instance
     *
     * @param  LlgTransferRequestContract  $request
     * @param  string  $contents
     * @return LlgTransferResponseContract
     */
    public function makeResponse(LlgTransferRequestContract $request, string $contents);
}
