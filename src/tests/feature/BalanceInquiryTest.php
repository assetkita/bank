<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Exceptions\PermatabankExceptions\BalanceInquiryException;
use Assetku\BankService\Mocks\BalanceInquiryMock;
use GuzzleHttp\Exception\GuzzleException;

class BalanceInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessBalanceInquiry()
    {
        $mock = new BalanceInquiryMock('701075323');

        try {
            $balanceInquiry = \Bank::balanceInquiry($mock);

            $this->assertTrue(
                $balanceInquiry->getStatusCode() === '00'
            );
        } catch (BalanceInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testAccountNotFoundBalanceInquiry()
    {
        $mock = new BalanceInquiryMock('701075329');

        try {
            $balanceInquiry = \Bank::balanceInquiry($mock);

            $this->assertTrue(
                $balanceInquiry->getStatusCode() === '02'
            );
        } catch (BalanceInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
