<?php

namespace Assetku\BankService\tests\Feature;

use GuzzleHttp\Exception\GuzzleException;

use Assetku\BankService\tests\TestCase;

class InquiryHighRiskRatingTest extends TestCase
{
    public function testUserHasHighRiskTest()
    {
        $custRefId = mt_rand(00000, 99999);

        $data = [
            'IdNumber' => '4610815675045937',
            'EmploymentType' => 'B',
            'EconomySector' => '001',
            'Position' => 'Staff'
        ];

        try {
            $inquiryRiskRating = \Bank::inquiryRiskRating($data, $custRefId);

            $this->assertTrue(
                $inquiryRiskRating->getStatusCode() === '00',
                $inquiryRiskRating->getStatusDescription() === 'Success',
                $inquiryRiskRating->getRiskStatus() === '2',
                $inquiryRiskRating->getRiskStatusDesc() === 'High Risk'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }    
}
