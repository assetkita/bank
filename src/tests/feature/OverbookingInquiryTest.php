<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingInquiryException;
use Assetku\BankService\Mocks\OverbookingInquiryMock;
use GuzzleHttp\Exception\GuzzleException;

class OverbookingInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessOverbookingInquiry()
    {
        $mock = new OverbookingInquiryMock('9999002800');

        try {
            $overbookingInquiry = \Bank::overbookingInquiry($mock);

            $this->assertTrue($overbookingInquiry->isSuccess());
        } catch (OverbookingInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testAccountNotFoundOverbookingInquiry()
    {
        $mock = new OverbookingInquiryMock('12345');

        try {
            $overbookingInquiry = \Bank::overbookingInquiry($mock);

            $this->assertTrue(
                $overbookingInquiry->getMeta()->getStatusCode() === '14'
            );
        } catch (OverbookingInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
