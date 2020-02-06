<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;

class AccountValidationInquiryTest extends TestCase
{
    public function testSuccessAccountValidationInquiry()
    {
        try {
            $applicationStatusInquiry = \BankService::accountValidationInquiry(
                '9548000235',
                '1769751406166610',
                '087851968989',
                'AGUNG TRILAKSONO',
                '1997-12-08',
                'Surabaya'
            );

            $this->assertTrue($applicationStatusInquiry->statusCode() === '00');
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
