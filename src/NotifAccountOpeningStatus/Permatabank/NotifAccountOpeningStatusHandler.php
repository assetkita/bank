<?php

namespace Assetku\BankService\NotifAccountOpeningStatus\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseResponse;
use Assetku\BankService\Contracts\NotifAccountOpeningStatus\NotifAccountOpeningStatusHandlerInterface;
use Assetku\BankService\Contracts\ProductInterface;

class NotifAccountOpeningStatusHandler extends BaseResponse implements NotifAccountOpeningStatusHandlerInterface
{
    /**
     * @var string
     */
    protected $referralCode;

    /**
     * @var string
     */
    protected $groupId;

    /**
     * @var ProductInterface[]
     */
    protected $products;

    /**
     * NotifAccountOpeningStatusHandler constructor.
     *
     * @param  array  $messageResponseHeader
     * @param  string  $referralCode
     * @param  string  $groupId
     * @param  ProductInterface[]  $products
     */
    public function __construct(array $messageResponseHeader, string $referralCode, string $groupId, $products)
    {
        parent::__construct($messageResponseHeader);

        $this->referralCode = $referralCode;

        $this->groupId = $groupId;

        $this->products = $products;
    }

    /**
     * @inheritDoc
     */
    public function referralCode()
    {
        return $this->referralCode;
    }

    /**
     * @inheritDoc
     */
    public function groupId()
    {
        return $this->groupId;
    }

    /**
     * @inheritDoc
     */
    public function products()
    {
        return $this->products;
    }

    /**
     * @inheritDoc
     */
    public function response()
    {
        return json_encode([
            'OpeningAccountNotifyRs' => [
                'MsgRsHdr' => [
                    'ResponseTimestamp' => $this->responseTimestamp,
                    'CustRefID'         => $this->customerReferralId,
                    'StatusCode'        => '00',
                    'StatusDesc'        => 'Approved'
                ],
            ],
        ]);
    }
}
