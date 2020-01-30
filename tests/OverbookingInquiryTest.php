<?php

namespace Assetku\BankService\tests;

use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OverbookingInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     * @throws HttpException
     */
    public function testSuccessOverbookingInquiry()
    {
        try {
            $overbookingInquiry = \BankService::overbookingInquiry('9999002800');

            $this->assertTrue($overbookingInquiry->isSuccess());
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
    public function testAccountNotFoundOverbookingInquiry()
    {
        try {
            $overbookingInquiry = \BankService::overbookingInquiry('123456789');

            $this->assertTrue($overbookingInquiry->getMeta()->getStatusCode() === '14');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (HttpException $e) {
            throw $e;
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
