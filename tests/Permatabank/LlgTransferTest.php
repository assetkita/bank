<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Mocks\LlgTransferMock;
use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class LlgTransferTest extends TestCase
{
    /**
     * @throws RequestException
     */
    public function testSuccessLlgTransfer()
    {
        $mock = new LlgTransferMock('701075323', 1000000000);

        try {
            $llgTransfer = \BankService::llgTransfer($mock);

            $this->assertTrue($llgTransfer->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * @throws RequestException
     */
    public function testAccountNotFoundLlgTransfer()
    {
        $mock = new LlgTransferMock('701075324', 1000000000);

        try {
            $llgTransfer = \BankService::llgTransfer($mock);

            $this->assertTrue($llgTransfer->statusCode() === '14');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
