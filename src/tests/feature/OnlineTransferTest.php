<?php

namespace Assetku\BankService\tests\Feature;

use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException;
use Assetku\BankService\Mocks\OnlineTransferMock;
use GuzzleHttp\Exception\GuzzleException;
use Assetku\BankService\tests\TestCase;

class OnlineTransferTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessOnlineTransfer()
    {
        $mock = new OnlineTransferMock('701075323', 10000);

        try {
            $onlineTransfer = \Bank::onlineTransfer($mock);

            $this->assertTrue($onlineTransfer->isSuccess());
        } catch (OnlineTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testInvalidAccountOnlineTransfer()
    {
        $mock = new OnlineTransferMock('701075324', 10000);

        try {
            $onlineTransfer = \Bank::onlineTransfer($mock);

            $this->assertTrue($onlineTransfer->getMeta()->getStatusCode() === '02' && $onlineTransfer->getMeta()->getStatusDescription() === 'Invalid Account');
        } catch (OnlineTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testInsufficientFundOnlineTransfer()
    {
        $mock = new OnlineTransferMock('701075331',1000000000);

        try {
            $onlineTransfer = \Bank::onlineTransfer($mock);

            $this->assertTrue($onlineTransfer->getMeta()->getStatusCode() === '51' && $onlineTransfer->getMeta()->getStatusDescription() === 'Insufficient Fund ( from debited account )');
        } catch (OnlineTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}