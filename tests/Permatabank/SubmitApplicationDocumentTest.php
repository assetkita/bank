<?php

namespace Assetku\BankService\tests\Feature;

use Assetku\BankService\tests\TestCase;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Validation\ValidationException;

class SubmitApplicationDocumentTest extends TestCase
{
    public function testSuccessSubmitApplicationDocument()
    {
        try {
            $submitDocument = \BankService::submitApplicationDocument('U070220011664', 'https://picsum.photos/200/200?random=1');

            $this->assertTrue($submitDocument->statusCode() === '00');
        } catch (ValidationException $e) {
            dd($e->errors());
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
