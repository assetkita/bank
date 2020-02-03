<?php

namespace Assetku\BankService\Contracts\SubmitRegistrationDocument;

interface SubmitRegistrationDocumentFactoryContract
{
    /**
     * Create a new fintech account request instance
     *
     * @param  FintechAccountSubject  $subject
     * @return SubmitFintechAccountRequestContract
     */
    public function makeRequest(FintechAccountSubject $subject);

    /**
     * Create a new fintech account response instance
     *
     * @param  SubmitFintechAccountRequestContract  $request
     * @param  string  $contents
     * @return SubmitFintechAccountResponseContract
     */
    public function makeResponse(SubmitFintechAccountRequestContract $request, string $contents);
}
