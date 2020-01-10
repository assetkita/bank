<?php

namespace Assetku\BankService\tests;

use GuzzleHttp\Exception\GuzzleException;

class InquiryOnlineTransferTest extends TestCase
{
    public function testSuccessInquiryOnlineTransferTest()
    {
        $custRefID = 'ASSET'.mt_rand(111111111, 999999999);
        $accountNumber = '701075331';

        $payload = [
            'ToAccount' => $accountNumber,
            'BankId' => '90010',
            'BankName' => str_replace(' ', '', 'BANK BNI')
        ];

        try {
            $inquiryOnlineTransfer = \Bank::onlineTransferInquiry($payload, $custRefID);

            $this->assertTrue(
                $inquiryOnlineTransfer->getStatusCode() === '00',
                $inquiryOnlineTransfer->getStatusDesc() === '00',
                $inquiryOnlineTransfer->getBankId() === $payload['BankId']
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function testInvalidBankCode()
    {
        $custRefID = 'ASSET'.mt_rand(111111111, 999999999);
        $accountNumber = mt_rand(111111111, 999999999);

        $payload = [
            'ToAccount' => $accountNumber,
            'BankId' => '48234',
            'BankName' => str_replace(' ', '', 'BANK BNI')
        ];

        try {
            $inquiryOnlineTransfer = \Bank::onlineTransferInquiry($payload, $custRefID);
            $this->assertTrue(
                $inquiryOnlineTransfer->getStatusCode() === '31',
                $inquiryOnlineTransfer->getStatusDesc() === '31',
                $inquiryOnlineTransfer->getBankId() === $payload['BankId']
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
