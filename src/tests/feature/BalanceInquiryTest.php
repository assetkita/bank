<?php

namespace Assetku\BankService\tests\Feature;

use Assetku\BankService\Mocks\BalanceInquiryMock;
use GuzzleHttp\Exception\GuzzleException;
use Assetku\BankService\tests\TestCase;

class BalanceInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessFullGetBalanceInquiry()
    {
        $mock = new BalanceInquiryMock('701075323');

        try {
            $balanceInquiry = \Bank::balanceInquiry($mock);
            dd($balanceInquiry);

            $this->assertTrue(
                $balanceInquiry->getStatusCode() === '00'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }    
}
