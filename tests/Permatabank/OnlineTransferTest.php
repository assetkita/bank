<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Exceptions\OnlineTransferInquiryException;
use Assetku\BankService\Mocks\OnlineTransferMock;
use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class OnlineTransferTest extends TestCase
{
    /**
     * @throws RequestException
     */
    public function testSuccessOnlineTransfer()
    {
        $mock = new OnlineTransferMock('701075323', 10000);

        try {
            $onlineTransfer = \BankService::onlineTransfer($mock);

            $this->assertTrue($onlineTransfer->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        } catch (OnlineTransferInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }

    /**
     * @throws RequestException
     */
    public function testInvalidAccountOnlineTransfer()
    {
        $mock = new OnlineTransferMock('701075324', 10000);

        try {
            $onlineTransfer = \BankService::onlineTransfer($mock);

            $this->assertTrue($onlineTransfer->statusCode() === '02');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        } catch (OnlineTransferInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }
}
