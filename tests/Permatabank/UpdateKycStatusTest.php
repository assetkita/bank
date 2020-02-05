<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;

class UpdateKycStatusTest extends TestCase
{
    public function testSuccessUpdateKycStatus()
    {
        $data = [
            'ReffCode'        => 'U040220011594',
            'IdNumber'        => '1769751406166610',
            'KycStatus'       => '00',
            'KycFailedReason' => ''
        ];

        try {
            $updateKycRequest = \BankService::updateKycStatus($data);

            $this->assertTrue($updateKycRequest->statusCode() === '00');
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
