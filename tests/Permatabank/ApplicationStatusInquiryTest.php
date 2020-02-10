<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class ApplicationStatusInquiryTest extends TestCase
{
    public function testSuccessApplicationStatusInquiry()
    {
        try {
            $applicationStatusInquiry = \BankService::applicationStatusInquiry('U040220011594');

            $this->assertTrue($applicationStatusInquiry->statusCode() === '00');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
