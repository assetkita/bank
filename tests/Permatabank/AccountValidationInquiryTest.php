<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class AccountValidationInquiryTest extends TestCase
{
    public function testNotMatchAccountValidationInquiry()
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

            $this->assertTrue($applicationStatusInquiry->validationStatus() === 2);
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
