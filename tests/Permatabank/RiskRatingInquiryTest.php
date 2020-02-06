<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;

class RiskRatingInquiryTest extends TestCase
{
    public function testSuccessRiskRatingInquiry()
    {
        try {
            $riskRatingInquiry = \BankService::riskRatingInquiry('U040220011594', '0', '001', 'Staff');

            $this->assertTrue($riskRatingInquiry->statusCode() === '00');
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
