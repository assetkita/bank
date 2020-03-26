<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class UpdateKYCStatusTest extends TestCase
{
    public function testSuccessUpdateKYCStatusWithSuccessStatus()
    {
        try {
            $updateKycRequest = \BankService::UpdateKYCStatus('U100220011679', '3578070812970001');

            $this->assertTrue($updateKycRequest->statusCode() === '00');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }

    public function testSuccessUpdateKYCStatusWithFailedStatus()
    {
        try {
            $updateKycRequest = \BankService::UpdateKYCStatus('U100220011679', '3578070812970001', false);

            $this->assertTrue($updateKycRequest->statusCode() === '00');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
