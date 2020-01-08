<?php

namespace Assetku\BankService\tests;

use GuzzleHttp\Exception\GuzzleException;

class LlgTransferTest extends TestCase
{
    public function testSuccessLlgTransferTest()
    {
        $custRefID = 'ASSET'.mt_rand(00000, 99999);

        $payload = [
            'FromAccount' => '701075331',
            'ToAccount' => '701075323',
            'ToBankId' => '90010',
            'ToBankName' => 'BNI',
            'Amount' => 22001,
            'CurrencyCode' => 'IDR',
            'ChargeTo' => '0',
            'TrxDesc' => str_replace(' ', '', 'Coba 1'),
            'TrxDesc2' => str_replace(' ', '', 'Desc 2'),
            'CitizenStatus' => '0',
            'ResidentStatus' => '0',
            'BenefType' => '1',
            'BenefEmail' => str_replace(' ', '', 'john@gmail.com'),
            'BenefAcctName' => str_replace(' ', '', 'John'),
            'BenefPhoneNo' => '0821222333467',
            'BenefBankAddress' => str_replace(' ', '', 'JALAN JEND SUDIRMAN'),
            'BenefBankBranchName' => str_replace(' ', '', 'SUDIRMAN'),
            'BenefBankCity' => str_replace(' ', '', 'JAKARTA'),
            'FromAcctName' => str_replace(' ', '', 'Doe'),
            'FromCurrencyCode' => 'IDR',
            'Filler1' => '',
            'Filler2' => '',
            'Filler3' => '',
            'BenefAddress1' => str_replace(' ', '', 'jl Berkah no.14'),
            'BenefAddress2' => str_replace(' ', '', 'Perum Satu'),
            'BenefAddress3' => str_replace(' ', '', 'Pulo Gadung'),
            'DatiII' => '',
            'TkiFlag' => ''
        ];

        try {
            $llgTransfer = \Bank::llgTransfer($payload, $custRefID);
            $this->assertTrue(
                $llgTransfer->getStatusCode() === '00',
                $llgTransfer->getStatusDesc() === 'Success',
                $llgTransfer->getCustRefId() === $custRefID
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function testAccountNotFoundLlgTransferTest()
    {
        $custRefID = 'ASSET'.mt_rand(00000, 99999);

        $payload = [
            'FromAccount' => '472348979',
            'ToAccount' => '701075323',
            'ToBankId' => '90010',
            'ToBankName' => 'BNI',
            'Amount' => 22001,
            'CurrencyCode' => 'IDR',
            'ChargeTo' => '0',
            'TrxDesc' => str_replace(' ', '', 'Coba 1'),
            'TrxDesc2' => str_replace(' ', '', 'Desc 2'),
            'CitizenStatus' => '0',
            'ResidentStatus' => '0',
            'BenefType' => '1',
            'BenefEmail' => str_replace(' ', '', 'john@gmail.com'),
            'BenefAcctName' => str_replace(' ', '', 'John'),
            'BenefPhoneNo' => '0821222333467',
            'BenefBankAddress' => str_replace(' ', '', 'JALAN JEND SUDIRMAN'),
            'BenefBankBranchName' => str_replace(' ', '', 'SUDIRMAN'),
            'BenefBankCity' => str_replace(' ', '', 'JAKARTA'),
            'FromAcctName' => str_replace(' ', '', 'Doe'),
            'FromCurrencyCode' => 'IDR',
            'Filler1' => '',
            'Filler2' => '',
            'Filler3' => '',
            'BenefAddress1' => str_replace(' ', '', 'jl Berkah no.14'),
            'BenefAddress2' => str_replace(' ', '', 'Perum Satu'),
            'BenefAddress3' => str_replace(' ', '', 'Pulo Gadung'),
            'DatiII' => '',
            'TkiFlag' => ''
        ];

        try {
            $llgTransfer = \Bank::llgTransfer($payload, $custRefID);
            $this->assertTrue(
                $llgTransfer->getStatusCode() === '14',
                $llgTransfer->getStatusDesc() !== 'Success'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
