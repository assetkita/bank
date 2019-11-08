<?php

namespace Assetku\BankService\tests;

use GuzzleHttp\Exception\GuzzleException;

class OnlineTransferTest extends TestCase
{
    public function testSuccessInquiryOnlineTransferTest()
    {
        $custRefID = 'ASSET'.mt_rand(00000, 99999);

        $payload = [
            'FromAccount' => '701075331',
            'ToAccount' => '701075323',
            'ToBankId' => '90010',
            'ToBankName' => 'BNI',
            'Amount' => 20001,
            'ChargeTo' => '0',
            'TrxDesc' => str_replace(' ', '', 'Coba 1'),
            'TrxDesc2' => str_replace(' ', '', 'Desc 2'),
            'BenefEmail' => 'john@gmail.com',
            'BenefAcctName' => 'John',
            'BenefPhoneNo' => '0821222333467',
            'FromAcctName' => 'Doe',
            'DatiII' => '',
            'TkiFlag' => ''
        ];

        try {
            $onlineTransfer = \Bank::onlineTransfer($payload, $custRefID);
            $this->assertTrue(
                $onlineTransfer->getStatusCode() === '00',
                $onlineTransfer->getStatusDesc() === 'Success',
                $onlineTransfer->getCustRefId() === $custRefID
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function testInvalidAccountOnlineTransfer()
    {
        $custRefID = 'ASSET'.mt_rand(00000, 99999);

        $payload = [
            'FromAccount' => '498908889',
            'ToAccount' => '701075323',
            'ToBankId' => '90010',
            'ToBankName' => 'BNI',
            'Amount' => 20001,
            'ChargeTo' => '0',
            'TrxDesc' => str_replace(' ', '', 'Coba 1'),
            'TrxDesc2' => str_replace(' ', '', 'Desc 2'),
            'BenefEmail' => 'john@gmail.com',
            'BenefAcctName' => 'John',
            'BenefPhoneNo' => '0821222333467',
            'FromAcctName' => 'Doe',
            'DatiII' => '',
            'TkiFlag' => ''
        ];

        try {
            $onlineTransfer = \Bank::onlineTransfer($payload, $custRefID);
            $this->assertTrue(
                $onlineTransfer->getStatusCode() === '02',
                $onlineTransfer->getStatusDesc() === 'Invalid Account',
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
