<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class OnlineTransferInquiryTest extends TestCase
{
    /**
     * @throws RequestException
     */
    public function testSuccessInquiryOnlineTransfer()
    {
        try {
            $onlineTransferInquiry = \BankService::onlineTransferInquiry('701075323', '90010', 'BANK BNI');

            $this->assertTrue($onlineTransferInquiry->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * @throws RequestException
     */
    public function testInvalidBankCodeOnlineTransfer()
    {
        try {
            $onlineTransferInquiry = \BankService::onlineTransferInquiry('701075331', '12345', 'BANK BNI');

            $this->assertTrue($onlineTransferInquiry->statusCode() === '31');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
