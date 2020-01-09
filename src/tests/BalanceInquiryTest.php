<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Mocks\BalanceInquiryMock;
use GuzzleHttp\Exception\GuzzleException;

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

            $this->assertTrue(
                $balanceInquiry->getStatusCode() === '00'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }    
}
