<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingInquiryException;
use Assetku\BankService\Mocks\OverbookingInquiryMock;
use GuzzleHttp\Exception\GuzzleException;

class OverbookingInquiryTest extends TestCase
{
    public function testSuccessInquiryOverbooking()
    {
        $mock = new OverbookingInquiryMock();

        try {
            $overbookingInquiry = \Bank::overbookingInquiry($mock);

            $this->assertTrue(
                $overbookingInquiry->getStatusCode() === '00' &&
                $overbookingInquiry->getStatusDescription() === 'Success' &&
                $overbookingInquiry->getAccountNumber() === '9999002800'
            );
        } catch (OverbookingInquiryException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
