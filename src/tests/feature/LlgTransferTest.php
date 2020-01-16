<?php

namespace Assetku\BankService\tests\Feature;

use Assetku\BankService\Exceptions\PermatabankExceptions\LlgTransferException;
use Assetku\BankService\Mocks\LlgTransferMock;
use GuzzleHttp\Exception\GuzzleException;
use Assetku\BankService\tests\TestCase;

class LlgTransferTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessLlgTransfer()
    {
        $mock = new LlgTransferMock('701075323', 1000000000);

        try {
            $llgTransfer = \Bank::llgTransfer($mock);

            $this->assertTrue($llgTransfer->isSuccess());
        } catch (LlgTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testAccountNotFoundLlgTransfer()
    {
        $mock = new LlgTransferMock('701075324', 1000000000);

        try {
            $llgTransfer = \Bank::llgTransfer($mock);

            $this->assertTrue($llgTransfer->getMeta()->getStatusCode() === '14' && $llgTransfer->getMeta()->getStatusDescription() === 'Account Not Found'
            );
        } catch (LlgTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
