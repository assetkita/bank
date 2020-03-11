<?php

namespace Assetku\BankService\NotifAccountOpeningStatus\Permatabank;

use Assetku\BankService\Contracts\NotifAccountOpeningStatus\NotifAccountOpeningStatusFactoryInterface;

class NotifAccountOpeningStatusFactory implements NotifAccountOpeningStatusFactoryInterface
{
    /**
     * @inheritDoc
     */
    public function makeHandler(string $contents)
    {
        $data = json_decode($contents, true);

        $response = $data['OpeningAccountNotifyRq'];

        $applicationInfo = $response['ApplicationInfo'];

        $products = array_map(function ($product) {
            return new Product($product['ProductType'], $product['AccountNumber']);
        }, $applicationInfo['Product']);

        return new NotifAccountOpeningStatusHandler(
            $response['MsgRqHdr'],
            $applicationInfo['ReffCode'],
            $applicationInfo['GroupID'],
            $products
        );
    }
}
