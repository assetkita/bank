<?php

namespace Assetku\BankService\Tests;

use Assetku\BankService\Exceptions\OverbookingInquiryException;
use Assetku\BankService\Mocks\OverbookingMock;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OverbookingTest extends TestCase
{
    /**
     * @throws GuzzleException
     * @throws HttpException
     */
    public function testSuccessOverbooking()
    {
        $mock = new OverbookingMock('9548000235');

        try {
            $overbooking = \BankService::overbooking($mock);

            $this->assertTrue($overbooking->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        } catch (OverbookingInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }

    /**
     * @throws GuzzleException
     * @throws HttpException
     */
    public function testInvalidAccountOverbooking()
    {
        $mock = new OverbookingMock(mt_rand('111111111', '999999999'));

        try {
            $overbooking = \BankService::overbooking($mock);

            $this->assertTrue($overbooking->getMeta()->getStatusCode() === '02');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        } catch (OverbookingInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        }
    }
}
