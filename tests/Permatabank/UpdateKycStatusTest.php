<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class UpdateKycStatusTest extends TestCase
{
    public function testSuccessUpdateKycStatus()
    {
        try {
            $updateKycRequest = \BankService::updateKycStatus('U060220011636', '3578070812970001', '00');

            $this->assertTrue($updateKycRequest->statusCode() === '00');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
