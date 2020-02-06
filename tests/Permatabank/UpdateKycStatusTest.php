<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;

class UpdateKycStatusTest extends TestCase
{
    public function testSuccessUpdateKycStatus()
    {
        $data = [
            'ReffCode'        => 'U060220011636',
            'IdNumber'        => '3578070812970001',
            'KycStatus'       => '00',
            'KycFailedReason' => ''
        ];

        try {
            $updateKycRequest = \BankService::updateKycStatus($data);
            dd($updateKycRequest);

            $this->assertTrue($updateKycRequest->statusCode() === '00');
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
