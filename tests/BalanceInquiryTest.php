<?php

namespace Assetku\BankService\Tests;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BalanceInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     * @throws HttpException
     */
    public function testSuccessBalanceInquiry()
    {
        try {
            $balanceInquiry = \BankService::balanceInquiry('701075323');

            $this->assertTrue($balanceInquiry->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @throws GuzzleException
     * @throws HttpException
     */
    public function testInvalidAccountBalanceInquiry()
    {
        try {
            $balanceInquiry = \BankService::balanceInquiry('123456789');

            $this->assertTrue($balanceInquiry->getMeta()->getStatusCode() === '02');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
