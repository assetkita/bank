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

            $this->assertTrue(
                $overbooking->getStatusCode() === '00' &&
                $overbooking->getStatusDescription() === 'Success'
            );
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
        $mock = new OverbookingMock('111111111');

        try {
            $overbooking = \Bank::overbooking($mock);

            $this->assertTrue(
                $overbooking->getStatusCode() === '02',
                $overbooking->getStatusDescription() === 'Invalid Account'
            );
        } catch (OverbookingException $e) {
            dd($e->getCode(), $e->getMessage());
        }  catch (GuzzleException $e) {
            throw $e;
        }
    }
}
