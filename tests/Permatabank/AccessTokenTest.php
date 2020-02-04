<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class AccessTokenTest extends TestCase
{
    /**
     * @throws RequestException
     */
    public function testSuccessAccessToken()
    {
        try {
            $accessToken = \BankService::accessToken();

            $this->assertTrue(isset($accessToken));
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
