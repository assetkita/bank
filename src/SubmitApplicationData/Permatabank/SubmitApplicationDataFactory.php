<?php

namespace Assetku\BankService\SubmitApplicationData\Permatabank;

use Assetku\BankService\Contracts\Subjects\SubmitFintechAccountSubject;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataFactoryContract;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataRequestContract;

class SubmitApplicationDataFactory implements SubmitApplicationDataFactoryContract
{
    /**
     * @inheritDoc
     */
    public function makeRequest(array $data)
    {
        return new SubmitApplicationDataRequest($data);
    }

    /**
     * @inheritDoc
     */
    public function makeResponse(SubmitApplicationDataRequestContract $request, string $content)
    {
        $data = json_decode($content, true);

        $response = $data['SubmitApplicationRs'];

        return new SubmitApplicationDataResponse($response['MsgRsHdr'], $response['ApplicationInfo']['ReffCode']);
    }
}
