<?php

namespace Assetku\BankService\tests\Feature;

use Assetku\BankService\Exceptions\PermatabankExceptions\BalanceInquiryException;
use Assetku\BankService\Mocks\BalanceInquiryMock;
use GuzzleHttp\Exception\GuzzleException;
use Assetku\BankService\tests\TestCase;

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
                $balanceInquiry->isSuccess()
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
    public function testInvalidAccountBalanceInquiry()
    {
        $mock = new BalanceInquiryMock('12345');

        try {
            $balanceInquiry = \Bank::balanceInquiry($mock);

            $this->assertTrue(
                $balanceInquiry->getMeta()->getStatusCode() === '02'
            );
        } catch (BalanceInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
