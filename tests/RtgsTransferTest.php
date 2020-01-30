<?php

namespace Assetku\BankService\Tests;

use Assetku\BankService\Mocks\RtgsTransferMock;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class RtgsTransferTest extends TestCase
{
    /**
     * @throws GuzzleException
     * @throws HttpException
     */
    public function testSuccessRtgsTransfer()
    {
        $mock = new RtgsTransferMock('701075323', 10000000000);

        try {
            $rtgsTransfer = \BankService::rtgsTransfer($mock);
            
            $this->assertTrue($rtgsTransfer->isSuccess());
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
    public function testAccountNotFoundRtgsTransfer()
    {
        $mock = new RtgsTransferMock('701075324', 10000000000);

        try {
            $rtgsTransfer = \BankService::rtgsTransfer($mock);

            $this->assertTrue($rtgsTransfer->getMeta()->getStatusCode() === '14');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
