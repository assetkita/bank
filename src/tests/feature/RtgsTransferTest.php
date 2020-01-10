<?php

namespace Assetku\BankService\tests\Feature;

use GuzzleHttp\Exception\GuzzleException;

use Assetku\BankService\Mocks\RtgsTransferMock;

use Assetku\BankService\tests\TestCase;

class RtgsTransferTest extends TestCase
{
    public function testSuccessfulRtgsTransfer()
    {
        $mock = new RtgsTransferMock;

        try {
            $rtgsTransfer = \Bank::rtgsTransfer($mock);
            
            $this->assertTrue(
                $rtgsTransfer->getStatusCode() === '00' &&
                $rtgsTransfer->getStatusDesc() === 'Success'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
