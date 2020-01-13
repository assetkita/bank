<?php

namespace Assetku\BankService\tests\Feature;

use Assetku\BankService\Exceptions\PermatabankExceptions\BalanceInquiryException;
use Assetku\BankService\tests\TestCase;
use GuzzleHttp\Exception\GuzzleException;

class BalanceInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessBalanceInquiry()
    {
        try {
            $balanceInquiry = \Bank::balanceInquiry('701075323');

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
        try {
            $balanceInquiry = \Bank::balanceInquiry('12345');

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
