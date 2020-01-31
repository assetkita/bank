<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class OverbookingInquiryTest extends TestCase
{
    /**
     * @throws RequestException
     * @throws HttpException
     */
    public function testSuccessOverbookingInquiry()
    {
        try {
            $overbookingInquiry = \BankService::overbookingInquiry('9999002800');

            $this->assertTrue($overbookingInquiry->isSuccess());
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    /**
     * @throws RequestException
     * @throws HttpException
     */
    public function testAccountNotFoundOverbookingInquiry()
    {
        try {
            $overbookingInquiry = \BankService::overbookingInquiry('123456789');

            $this->assertTrue($overbookingInquiry->statusCode() === '14');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
