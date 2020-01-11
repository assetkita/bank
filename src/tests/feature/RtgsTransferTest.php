<?php

namespace Assetku\BankService\tests\Feature;

use Assetku\BankService\Exceptions\PermatabankExceptions\RtgsTransferException;
use Assetku\BankService\Mocks\RtgsTransferMock;
use Assetku\BankService\tests\TestCase;
use GuzzleHttp\Exception\GuzzleException;

class RtgsTransferTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessRtgsTransfer()
    {
        $mock = new RtgsTransferMock;

        try {
            $rtgsTransfer = \Bank::rtgsTransfer($mock);
            
            $this->assertTrue(
                $rtgsTransfer->getStatusCode() === '00' &&
                $rtgsTransfer->getStatusDesc() === 'Success'
            );
        } catch (RtgsTransferException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
