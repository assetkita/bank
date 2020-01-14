<?php

namespace Assetku\BankService\tests\Feature;

use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingException;
use Assetku\BankService\Mocks\OverbookingMock;
use GuzzleHttp\Exception\GuzzleException;

use Assetku\BankService\tests\TestCase;

class OverbookingTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessOverbooking()
    {
        $mock = new OverbookingMock('701075331');

        try {
            $overbooking = \Bank::overbooking($mock);

            $this->assertTrue($overbooking->isSuccess());
        } catch (OverbookingException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testInvalidAccountOverbooking()
    {
        $mock = new OverbookingMock(mt_rand('111111111', '999999999'));

        try {
            $overbooking = \Bank::overbooking($mock);

            if ($overbooking->getMeta()) {
                $this->assertTrue(
                    $overbooking->getMeta()->getStatusCode() === '02',
                    $overbooking->getMeta()->getStatusDescription() === 'Invalid Account'
                );
            }

            $this->assertTrue(empty($overbooking->getMeta()));
        } catch (OverbookingException $e) {
            dd($e->getCode(), $e->getMessage());
        }  catch (GuzzleException $e) {
            throw $e;
        }
    }
}
