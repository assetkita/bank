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
    public function testSuccessOnlineTransferTest()
    {
        $mock = new OnlineTransferMock('701075323', 10000);

        try {
            $onlineTransfer = \Bank::onlineTransfer($mock);

            $this->assertTrue($onlineTransfer->getStatusCode() === '00' && $onlineTransfer->getStatusDesc() === 'Success'
            );
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

            $this->assertTrue($onlineTransfer->getStatusCode() === '02' && $onlineTransfer->getStatusDesc() === 'Invalid Account');
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

            $this->assertTrue($onlineTransfer->getStatusCode() === '51' && $onlineTransfer->getStatusDesc() === 'Insufficient Fund ( from debited account )');
        } catch (OnlineTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
