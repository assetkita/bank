<?php

namespace Assetku\BankService\tests;

use GuzzleHttp\Exception\GuzzleException;

class InquiryOverbookingTest extends TestCase
{
    public function testSuccessInquiryOverbooking()
    {
        $custRefID = 'ASSET'.mt_rand(111111111, 999999999);
        $accountNumber = '9999002800';

        try {
            $inquiryOverbooking = \Bank::inquiryOverbooking($accountNumber, $custRefID);
            $this->assertTrue(
                $inquiryOverbooking->getStatusCode() === '00',
                $inquiryOverbooking->getStatusDesc() === 'Success',
                $inquiryOverbooking->getAccountNumber() === $accountNumber,
                $inquiryOverbooking->getCustRefId() === $custRefID
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function testDuplicateCustomerReferenceNumber()
    {
        $custRefID = '398472349234';
        $accountNumber = '9999002800';

        try {
            $data = \Bank::inquiryOverbooking($accountNumber, $custRefID);
            $this->assertTrue(
                $data->getStatusCode() === '03',
                $data->getStatusDesc() === 'Duplicate Customer Reference Number',
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
