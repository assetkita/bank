<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException;
use Assetku\BankService\Mocks\OnlineTransferMock;
use GuzzleHttp\Exception\GuzzleException;

class OnlineTransferTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessInquiryOnlineTransferTest()
    {
        $mock = new OnlineTransferMock('701075323', 1);

        try {
            $onlineTransfer = \Bank::onlineTransfer($mock);
            $this->assertTrue(
                $onlineTransfer->getStatusCode() === '00' &&
                $onlineTransfer->getStatusDesc() === 'Success'
            );
        } catch (GuzzleException $e) {
            throw $e;
        } catch (OnlineTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testInvalidFromAccountOnlineTransfer()
    {
        $mock = new OnlineTransferMock('498908889', 20001);

        try {
            $onlineTransfer = \Bank::onlineTransfer($mock);

            $this->assertTrue($onlineTransfer->getStatusCode() === '02' && $onlineTransfer->getStatusDesc() === 'Invalid Account');
        } catch (GuzzleException $e) {
            throw $e;
        } catch (OnlineTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testInsufficientFundOnlineTransfer()
    {
        $mock = new OnlineTransferMock('701075331', 100000000);

        try {
            $onlineTransfer = \Bank::onlineTransfer($mock);

            $this->assertTrue($onlineTransfer->getStatusCode() === '51' && $onlineTransfer->getStatusDesc() === 'Insufficient Fund ( from debited account )');
        } catch (GuzzleException $e) {
            throw $e;
        } catch (OnlineTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }
}
