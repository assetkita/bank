<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use GuzzleHttp\Exception\GuzzleException;

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
            'DocContentType' => urlencode('image/jpeg'),
        ];

        try {
            $submitDocument = \BankService::submitDocument($payload, $cusRefId);
            $this->assertTrue(
                $submitDocument->statusCode() === '00',
                $submitDocument->getStatusDescription() === 'Success'
            );
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
