<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingInquiryException;
use GuzzleHttp\Exception\GuzzleException;

class OverbookingInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessOverbookingInquiry()
    {
        try {
            $overbookingInquiry = \Bank::overbookingInquiry('9999002800');

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
        try {
            $overbookingInquiry = \Bank::overbookingInquiry('12345');

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
