<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;

class InquiryAccountValidationTest extends TestCase
{
//    public function testSuccessValidationRequest()
//    {
//        $custRefId = mt_rand(00000, 99999);
//
//        $data = [
//            'AccountNumber' => '4610815675045937',
//            'IdNumber' => '',
//            'HandphoneNo' => '',
//            'CustomerName' => '',
//            'DateOfBirth' => '',
//            'CityOfBirth' => ''
//        ];
//
//        try {
//            $inquiryAccountValidation = \BankService::inquiryAccountValidation($data, $custRefId);
//            $this->assertTrue(
//                $inquiryAccountValidation->statusCode() === '00',
//                $inquiryAccountValidation->getStatusDescription() === 'Success',
//                $inquiryAccountValidation->getValidationStatus() === '2'
//            );
//        } catch (RequestException $e) {
//            throw $e;
//        }
//    }
}
