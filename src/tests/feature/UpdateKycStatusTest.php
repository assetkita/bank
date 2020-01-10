<?php

namespace Assetku\BankService\tests\Feature;

use GuzzleHttp\Exception\GuzzleException;

use Assetku\BankService\tests\TestCase;

class UpdateKycStatusTest extends TestCase
{
    public function testSuccessUpdateKycStatus()
    {
        $custRefId = \mt_rand(00000, 99999);

        $data = [
            'ReffCode' => 'U061219011270',
            'IdNumber' => '4610815675045937',
            'KycStatus' => '00',
            'KycFailedReason' => ''
        ];

        try {
            $updateKycRequest = \Bank::updateKycStatus($data, $custRefId);

            $this->assertTrue(
                $updateKycRequest->getStatusCode() === '00',
                $updateKycRequest->getCustRefId() === $custRefId
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
