<?php

namespace Assetku\BankService\tests;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class StatusTransactionInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     * @throws HttpException
     */
    public function testSuccessStatusTransactionInquiry()
    {
        try {
            $statusTransactionInquiry = \BankService::statusTransactionInquiry('6Rbx07tLkxSWWy84xH7s');

            $this->assertTrue($statusTransactionInquiry->isSuccess());
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
    public function testNotFoundStatusTransactionInquiry()
    {
        try {
            $statusTransactionInquiry = \BankService::statusTransactionInquiry(random_alphanumeric());

            $this->assertTrue($statusTransactionInquiry->getMeta()->getStatusCode() === '14');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
