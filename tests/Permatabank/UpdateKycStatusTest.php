<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;

class UpdateKycStatusTest extends TestCase
{
    public function testSuccessUpdateKycStatus()
    {
        $data = [
            'ReffCode'        => 'U030220011586',
            'IdNumber'        => '1769751406166610',
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
