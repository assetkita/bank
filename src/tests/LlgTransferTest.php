<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Exceptions\PermatabankExceptions\LlgTransferException;
use Assetku\BankService\Mocks\LlgTransferMock;
use GuzzleHttp\Exception\GuzzleException;

class LlgTransferTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessLlgTransferTest()
    {
        $mock = new LlgTransferMock('701075323', 1000000000);

        try {
            $llgTransfer = \Bank::llgTransfer($mock);

            $this->assertTrue($llgTransfer->getStatusCode() === '00' && $llgTransfer->getStatusDesc() === 'Success'
            );
        } catch (LlgTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testAccountNotFoundLlgTransferTest()
    {
        $mock = new LlgTransferMock('701075324', 1000000000);

        try {
            $llgTransfer = \Bank::llgTransfer($mock);

            $this->assertTrue($llgTransfer->getStatusCode() === '14' && $llgTransfer->getStatusDesc() === 'Account Not Found'
            );
        } catch (LlgTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testAmountTransactionIsUnderRTGSLimitAmountLlgTransferTest()
    {
        $mock = new LlgTransferMock('701075323', 10000000000);

        try {
            $llgTransfer = \Bank::llgTransfer($mock);

            $this->assertTrue($llgTransfer->getStatusCode() === '17' && $llgTransfer->getStatusDesc() === 'Amount Transaction is under RTGS Limit Amount'
            );
        } catch (LlgTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
