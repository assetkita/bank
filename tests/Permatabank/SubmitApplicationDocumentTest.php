<?php

namespace Assetku\BankService\tests\Feature;

use Assetku\BankService\tests\TestCase;
use GuzzleHttp\Exception\RequestException;

class SubmitApplicationDocumentTest extends TestCase
{
    public function testSuccessSubmitApplicationDocument()
    {
        $arrContextOptions = [
            "ssl" => [
                "verify_peer"      => false,
                "verify_peer_name" => false,
            ],
        ];

        $image = base64_encode(file_get_contents('https://assetkita.test/storage/user/identity_card/QBbmFxodTt1zTUznykxEZOfHp4c5LNezjWLgQVJh.jpeg',
            false, stream_context_create($arrContextOptions)));

        $payload = [
            'BankReffId'     => 'U040220011594',
            'DocType'        => 'KT',
            'DocName'        => 'KTP.jpg',
            'DocContent'     => urlencode($image),
            'DocContentType' => urlencode('image/jpeg')
        ];

        try {
            $submitDocument = \BankService::submitDocument($payload);
            dd($submitDocument);

            $this->assertTrue(
                $submitDocument->getStatusCode() === '00',
                $submitDocument->getStatusDescription() === 'Success'
            );
        } catch (RequestException $e) {
            throw $e;
        }
    }
}
