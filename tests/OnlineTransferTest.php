<?php

namespace Assetku\BankService\Tests;

use Assetku\BankService\Exceptions\OnlineTransferInquiryException;
use Assetku\BankService\Mocks\OnlineTransferMock;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OnlineTransferTest extends TestCase
{
    /**
     * @throws GuzzleException
     * @throws HttpException
     */
    public function testSuccessOnlineTransfer()
    {
        $mock = new OnlineTransferMock('701075323', 10000);

        try {
            $onlineTransfer = \BankService::onlineTransfer($mock);

            $this->assertTrue($onlineTransfer->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        } catch (OnlineTransferInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }

    /**
     * @throws GuzzleException
     * @throws HttpException
     */
    public function testInvalidAccountOnlineTransfer()
    {
        $mock = new OnlineTransferMock('701075324', 10000);

        try {
            $onlineTransfer = \BankService::onlineTransfer($mock);

            $this->assertTrue($onlineTransfer->getMeta()->getStatusCode() === '02');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        } catch (OnlineTransferInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }
}
