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
    public function testSuccessInquiryOnlineTransfer()
    {
        $mock = new OnlineTransferInquiryMock('90010');

        try {
            $onlineTransferInquiry = \Bank::onlineTransferInquiry($mock);

            $this->assertTrue(
                $onlineTransferInquiry->isSuccess()
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
    public function testInvalidBankCodeOnlineTransfer()
    {
        $mock = new OnlineTransferInquiryMock( '12345');

        try {
            $onlineTransferInquiry = \Bank::onlineTransferInquiry($mock);

            $this->assertTrue(
                $onlineTransferInquiry->getMeta()->getStatusCode() === '31'
            );
        } catch (OnlineTransferInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
