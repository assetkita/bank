<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Exceptions\OverbookingInquiryException;
use Assetku\BankService\Mocks\OverbookingMock;
use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class OverbookingTest extends TestCase
{
    /**
     * @throws RequestException
     */
    public function testSuccessOverbooking()
    {
        $mock = new OverbookingMock('9548000235');

        try {
            $overbooking = \BankService::overbooking($mock);

            $this->assertTrue($overbooking->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        } catch (OverbookingInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }

    /**
     * @throws RequestException
     */
    public function testInvalidAccountOverbooking()
    {
        $mock = new OverbookingMock(mt_rand('111111111', '999999999'));

        try {
            $overbooking = \BankService::overbooking($mock);

            $this->assertTrue($overbooking->statusCode() === '02');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        } catch (OverbookingInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }
}
