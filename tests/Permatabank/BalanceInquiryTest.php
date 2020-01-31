<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class BalanceInquiryTest extends TestCase
{
    /**
     * @throws RequestException
     */
    public function testSuccessBalanceInquiry()
    {
        try {
            $balanceInquiry = \BankService::balanceInquiry('701075323');

            $this->assertTrue($balanceInquiry->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * @throws RequestException
     */
    public function testInvalidAccountBalanceInquiry()
    {
        try {
            $balanceInquiry = \BankService::balanceInquiry('123456789');

            $this->assertTrue($balanceInquiry->statusCode() === '02');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
