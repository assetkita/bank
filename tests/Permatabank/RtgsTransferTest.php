<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Mocks\RtgsTransferMock;
use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class RtgsTransferTest extends TestCase
{
    /**
     * @throws RequestException
     */
    public function testSuccessRtgsTransfer()
    {
        $mock = new RtgsTransferMock('701075323', 10000000000);

        try {
            $rtgsTransfer = \BankService::rtgsTransfer($mock);
            
            $this->assertTrue($rtgsTransfer->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * @throws RequestException
     */
    public function testAccountNotFoundRtgsTransfer()
    {
        $mock = new RtgsTransferMock('701075324', 10000000000);

        try {
            $rtgsTransfer = \BankService::rtgsTransfer($mock);

            $this->assertTrue($rtgsTransfer->statusCode() === '14');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
