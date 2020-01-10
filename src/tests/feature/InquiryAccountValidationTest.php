<?php

namespace Assetku\BankService\tests;

use GuzzleHttp\Exception\GuzzleException;

class InquiryAccountValidationTest extends TestCase
{
    public function testSuccessValidationRequest()
    {
        $custRefId = mt_rand(00000, 99999);

        $data = [
            'AccountNumber' => '4610815675045937',
            'IdNumber' => '',
            'HandphoneNo' => '',
            'CustomerName' => '',
            'DateOfBirth' => '',
            'CityOfBirth' => ''
        ];

        try {
            $inquiryAccountValidation = \Bank::inquiryAccountValidation($data, $custRefId);
            $this->assertTrue(
                $inquiryAccountValidation->getStatusCode() === '00',
                $inquiryAccountValidation->getStatusDescription() === 'Success',
                $inquiryAccountValidation->getValidationStatus() === '2'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
