<?php

namespace Assetku\BankService\Tests\Permatabank;

use Assetku\BankService\Tests\TestCase;
use Exception;

class NotifAccountOpeningStatusTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testSuccessNotifAccountOpeningStatus()
    {
        $expected = json_encode([
            'OpeningAccountNotifyRs' => [
                'MsgRsHdr' => [
                    'ResponseTimestamp' => '2017-07-21T14:32:01+07:00',
                    'CustRefID'         => '0878987654321',
                    'StatusCode'        => '00',
                    'StatusDesc'        => 'Approved',
                ],
            ],
        ]);

        $contents = json_encode([
            'OpeningAccountNotifyRq' => [
                'MsgRqHdr'        => [
                    'RequestTimestamp' => '2017-07-21T14:32:01+07:00',
                    'CustRefID'        => '0878987654321',
                    'Status'           => '00',
                    'StatusCode'       => 'Open',
                ],
                'ApplicationInfo' => [
                    'ReffCode' => '12345678',
                    'GroupID'  => '',
                    'Product'  => [
                        [
                            'ProductType'   => 'UI',
                            'AccountNumber' => '123123123',
                        ],
                        [
                            'ProductType'   => 'G0',
                            'AccountNumber' => '241432343',
                        ],
                    ],
                ],
            ],
        ]);

        $callback = function ($products) {
            var_dump($products);
        };

        try {
            $actual = \BankService::notifAccountOpeningStatus($contents, $callback);
        } catch (Exception $e) {
            throw $e;
        }

        $this->assertJsonStringEqualsJsonString($expected, $actual);
    }
}
