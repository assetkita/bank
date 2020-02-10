<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class RiskRatingInquiryTest extends TestCase
{
    public function testSuccessRiskRatingInquiry()
    {
        try {
            $riskRatingInquiry = \BankService::riskRatingInquiry('3578070812970001', 'B', '001', 'Staff');

            $this->assertTrue($riskRatingInquiry->statusCode() === '00');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
