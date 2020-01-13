<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferInquiryException;
use GuzzleHttp\Exception\GuzzleException;

class OnlineTransferInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessInquiryOnlineTransfer()
    {
        try {
            $onlineTransferInquiry = \Bank::onlineTransferInquiry('701075331', '90010', 'BANK BNI');

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
        try {
            $onlineTransferInquiry = \Bank::onlineTransferInquiry('701075331', '12345', 'BANK BNI');

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
