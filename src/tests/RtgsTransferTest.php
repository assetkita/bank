<?php

namespace Assetku\BankService\tests;

use GuzzleHttp\Exception\GuzzleException;

use Assetku\BankService\Mocks\RtgsTransferMock;

class RtgsTransferTest extends TestCase
{
    public function testSuccessfulRtgsTransfer()
    {
        $mock = new RtgsTransferMock;

        try {
            $rtgsTransfer = \Bank::rtgsTransfer($mock);
            dd($rtgsTransfer);
            $this->assertTrue(
                $rtgsTransfer->getStatusCode() === '00' &&
                $rtgsTransfer->getStatusDesc() === 'Success'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
