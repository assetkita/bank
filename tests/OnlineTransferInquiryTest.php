<?php

namespace Assetku\BankService\tests;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OnlineTransferInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessInquiryOnlineTransfer()
    {
        try {
            $onlineTransferInquiry = \BankService::onlineTransferInquiry('701075323', '90010', 'BANK BNI');

            $this->assertTrue($onlineTransferInquiry->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
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
            $onlineTransferInquiry = \BankService::onlineTransferInquiry('701075331', '12345', 'BANK BNI');

            $this->assertTrue($onlineTransferInquiry->getMeta()->getStatusCode() === '31');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
