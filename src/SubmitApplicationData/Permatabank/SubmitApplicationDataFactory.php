<?php

namespace Assetku\BankService\SubmitApplicationData\Permatabank;

use Assetku\BankService\Contracts\Subjects\SubmitApplicationDataSubject;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataFactoryContract;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataRequestContract;

class SubmitApplicationDataFactory implements SubmitApplicationDataFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(SubmitApplicationDataSubject $subject)
    {
        return new SubmitApplicationDataRequest($subject);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(SubmitApplicationDataRequestContract $request, string $content)
    {
        $data = json_decode($content, true);
        dd($data);

        $response = $data['SubmitApplicationRs'];

        return new SubmitApplicationDataResponse($response['MsgRsHdr'], $response['ApplicationInfo']['ReffCode']);
    }
}
