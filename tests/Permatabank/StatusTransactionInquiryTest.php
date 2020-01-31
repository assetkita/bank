<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class StatusTransactionInquiryTest extends TestCase
{
    /**
     * @throws RequestException
     */
    public function testSuccessStatusTransactionInquiry()
    {
        try {
            $statusTransactionInquiry = \BankService::statusTransactionInquiry('6Rbx07tLkxSWWy84xH7s');

            $this->assertTrue($statusTransactionInquiry->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * @throws RequestException
     */
    public function testNotFoundStatusTransactionInquiry()
    {
        try {
            $statusTransactionInquiry = \BankService::statusTransactionInquiry(random_alphanumeric());

            $this->assertTrue($statusTransactionInquiry->statusCode() === '14');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
