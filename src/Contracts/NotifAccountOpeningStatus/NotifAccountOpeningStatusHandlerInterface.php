<?php

namespace Assetku\BankService\Contracts\NotifAccountOpeningStatus;

use Assetku\BankService\Contracts\Base\BaseResponseContract;
use Assetku\BankService\Contracts\ProductInterface;

interface NotifAccountOpeningStatusHandlerInterface extends BaseResponseContract
{
    /**
     * Get notif account opening status handler's referral code
     *
     * @return string
     */
    public function referralCode();

    /**
     * Get notif account opening status handler's group id
     *
     * @return string
     */
    public function groupId();

    /**
     * Get notif account opening status handler's products
     *
     * @return ProductInterface[]
     */
    public function products();

    /**
     * Get notif account opening status handler's response
     *
     * @return string
     */
    public function response();
}
