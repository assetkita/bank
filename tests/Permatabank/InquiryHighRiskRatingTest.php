<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;

class InquiryHighRiskRatingTest extends TestCase
{
//    public function testUserHasHighRiskTest()
//    {
//        $custRefId = mt_rand(00000, 99999);
//
//        $data = [
//            'IdNumber' => '4610815675045937',
//            'EmploymentType' => 'B',
//            'EconomySector' => '001',
//            'Position' => 'Staff'
//        ];
//
//        try {
//            $inquiryRiskRating = \BankService::inquiryRiskRating($data, $custRefId);
//
//            $this->assertTrue(
//                $inquiryRiskRating->statusCode() === '00',
//                $inquiryRiskRating->getStatusDescription() === 'Success',
//                $inquiryRiskRating->getRiskStatus() === '2',
//                $inquiryRiskRating->getRiskStatusDesc() === 'High Risk'
//            );
//        } catch (RequestException $e) {
//            throw $e;
//        }
//    }
}
