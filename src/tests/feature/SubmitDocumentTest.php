<?php

namespace Assetku\BankService\tests\Feature;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Exception\GuzzleException;

use Assetku\BankService\tests\TestCase;

class SubmitDocumentTest extends TestCase
{
    public function testSuccessSubmitDocument()
    {
        $cusRefId = mt_rand(00000, 99999);

        $image = base64_encode(file_get_contents('https://picsum.photos/id/237/200/300'));

        $payload = [
            'BankReffid' => 'U061219011270',
            'DocType' => 'KT',
            'DocName' => 'KTP.jpg',
            'DocContent' => urlencode($image),
            'DocContentType' => urlencode('image/jpeg')
        ];

        try {
            $submitDocument = \Bank::submitDocument($payload, $cusRefId);
            $this->assertTrue(
                $submitDocument->getStatusCode() === '00',
                $submitDocument->getStatusDescription() === 'Success'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
