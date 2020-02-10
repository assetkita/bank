<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Mocks\SubmitApplicationDataMock;
use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class SubmitApplicationDataTest extends TestCase
{
    public function testSuccessSubmitApplicationData()
    {
        $mock = new SubmitApplicationDataMock;

        try {
            $submitApplicationData = \BankService::submitApplicationData($mock);

            $this->assertTrue($submitApplicationData->statusCode() === '00');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
