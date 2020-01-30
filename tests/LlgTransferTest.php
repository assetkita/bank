<?php

namespace Assetku\BankService\Tests;

use Assetku\BankService\Mocks\LlgTransferMock;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LlgTransferTest extends TestCase
{
    /**
     * @throws GuzzleException
     * @throws HttpException
     */
    public function testSuccessLlgTransfer()
    {
        $mock = new LlgTransferMock('701075323', 1000000000);

        try {
            $llgTransfer = \BankService::llgTransfer($mock);

            $this->assertTrue($llgTransfer->isSuccess());
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
     * @throws HttpException
     */
    public function testAccountNotFoundLlgTransfer()
    {
        $mock = new LlgTransferMock('701075324', 1000000000);

        try {
            $llgTransfer = \BankService::llgTransfer($mock);

            $this->assertTrue($llgTransfer->getMeta()->getStatusCode() === '14');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
