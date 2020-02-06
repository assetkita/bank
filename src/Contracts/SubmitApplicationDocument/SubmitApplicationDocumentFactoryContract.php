<?php

namespace Assetku\BankService\Contracts\SubmitApplicationDocument;

interface SubmitApplicationDocumentFactoryContract
{
    /**
     * Create a new submit registration document request instance
     *
     * @param  array  $data
     * @return SubmitApplicationDocumentRequestContract
     */
    public function makeRequest(array $data);

    /**
     * Create a new submit registration document response instance
     *
     * @param  SubmitApplicationDocumentRequestContract  $request
     * @param  string  $contents
     * @return SubmitApplicationDocumentResponseContract
     */
    public function makeResponse(SubmitApplicationDocumentRequestContract $request, string $contents);
}
