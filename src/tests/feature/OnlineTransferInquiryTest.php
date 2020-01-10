<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferInquiryException;
use Assetku\BankService\Mocks\OnlineTransferInquiryMock;
use GuzzleHttp\Exception\GuzzleException;

class OnlineTransferInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessInquiryOnlineTransferTest()
    {
        $mock = new OnlineTransferInquiryMock('90010');

        try {
            $inquiryOnlineTransfer = \Bank::onlineTransferInquiry($mock);

            $this->assertTrue(
                $inquiryOnlineTransfer->getStatusCode() === '00' &&
                $inquiryOnlineTransfer->getBankId() === '90010'
            );
        } catch (OnlineTransferInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testInvalidBankCodeOnlineTransferTest()
    {
        $mock = new OnlineTransferInquiryMock('48234');

        try {
            $inquiryOnlineTransfer = \Bank::onlineTransferInquiry($mock);

            $this->assertTrue(
                $inquiryOnlineTransfer->getStatusCode() === '31' &&
                $inquiryOnlineTransfer->getBankId() === '48234'
            );
        } catch (OnlineTransferInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
