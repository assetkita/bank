<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\OnlineTransferInquirySubject;

class OnlineTransferInquiryMock implements OnlineTransferInquirySubject
{
    /**
     * @var string
     */
    protected $bankId;

    /**
     * OnlineTransferInquiryMock constructor.
     *
     * @param  string  $bankId
     */
    public function __construct(string $bankId)
    {
        $this->bankId = $bankId;
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferInquiryToAccount()
    {
        return '701075331';
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferInquiryBankId()
    {
        return $this->bankId;
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferInquiryBankName()
    {
        return 'BANK BNI';
    }
}
