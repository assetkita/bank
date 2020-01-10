<?php

namespace Assetku\BankService\tests\Feature;

use GuzzleHttp\Exception\GuzzleException;

use Assetku\BankService\tests\TestCase;

class InquiryStatusTransactionTest extends TestCase
{
    public function testSuccessInquiryTransaction()
    {
        $custRefID = 'ASSET59751';

        try {
            $inquiryStatusTransaction = \Bank::inquiryStatusTransaction($custRefID);

            $this->assertTrue(
                $inquiryStatusTransaction->getCustRefId() === $custRefID,
                $inquiryStatusTransaction->getStatusCode() === '00'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function testInquiryStatusNotFound()
    {
        $custRefID = mt_rand(1111111111, 9999999999);

        try {
            $inquiryStatusTransaction = \Bank::inquiryStatusTransaction($custRefID);
            $this->assertTrue(
                $inquiryStatusTransaction->getStatusCode() === '14',
                $inquiryStatusTransaction->getStatusDesc() == 'INQUIRY STATUS NOT FOUND'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
