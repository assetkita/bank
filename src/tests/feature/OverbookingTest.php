<?php

namespace Assetku\BankService\tests\Feature;

use GuzzleHttp\Exception\GuzzleException;

use Assetku\BankService\tests\TestCase;

class OverbookingTest extends TestCase
{
    public function testSuccessOverbooking()
    {
        $custRefID = 'ASSET'.mt_rand(111111111, 999999999);

        $data = [
            'FromAccount' => '701075331',
            'ToAccount' => '701075323',
            'Amount' => 21001,
            'CurrencyCode' => 'IDR',
            'ChargeTo' => '0',
            'TrxDesc' => str_replace(' ', '', 'Coba 1'),
            'TrxDesc2' => str_replace(' ', '', 'Desc 2'),
            'BenefEmail' => $email = $this->faker->safeEmail(),
            'BenefAcctName' => str_replace(' ', '', $this->faker->name),
            'BenefPhoneNo' => $phone = '08' . $this->randomPhoneNumbers(),
            'FromAcctName' => str_replace(' ', '', $this->faker->name),
            'TkiFlag' => ''
        ];

        try {
            $data = \Bank::overbooking($data, $custRefID);
            $this->assertTrue(
                $data->getStatusDesc() === 'Success',
                $data->getStatusCode() === '00'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    public function testInvalidAccountOverbooking()
    {
        $custRefID = 'ASSET'.mt_rand(111111111, 999999999);

        $data = [
            'FromAccount' => '111111111',
            'ToAccount' => '701075323',
            'Amount' => 21001,
            'CurrencyCode' => 'IDR',
            'ChargeTo' => '0',
            'TrxDesc' => str_replace(' ', '', 'Coba 1'),
            'TrxDesc2' => str_replace(' ', '', 'Desc 2'),
            'BenefEmail' => $email = $this->faker->safeEmail(),
            'BenefAcctName' => str_replace(' ', '', $this->faker->name),
            'BenefPhoneNo' => $phone = '08' . $this->randomPhoneNumbers(),
            'FromAcctName' => str_replace(' ', '', $this->faker->name),
            'TkiFlag' => ''
        ];

        try {
            $overbooking = \Bank::overbooking($data, $custRefID);
            $this->assertTrue(
                $overbooking->getStatusCode() === '02',
                $overbooking->getStatusDesc() === 'Invalid Account'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * Get random phone numbers
     *
     * @return int
     */
    protected function randomPhoneNumbers()
    {
        do {
            $numbers = mt_rand(1111111111, 9999999999);
        } while(substr($numbers, 0, 1) === '4');

        return $numbers;
    }
}
