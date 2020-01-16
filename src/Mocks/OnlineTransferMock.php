<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\OnlineTransferSubject;

class OnlineTransferMock implements OnlineTransferSubject
{
    /**
     * @var string
     */
    protected $fromAccount;

    /**
     * @var int
     */
    protected $amount;

    /**
     * OnlineTransferMock constructor.
     *
     * @param  string  $fromAccount
     * @param  int  $amount
     */
    public function __construct(string $fromAccount, int $amount)
    {
        $this->fromAccount = $fromAccount;
        $this->amount = $amount;
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferFromAccount()
    {
        return $this->fromAccount;
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferFromAccountName()
    {
        return 'Doe';
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferFromBankName()
    {
        return 'Bank BNI';
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferToAccount()
    {
        return '701075331';
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferToBankId()
    {
        return '90010';
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferToBankName()
    {
        return 'BANK BNI';
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferAmount()
    {
        return $this->amount;
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferTransactionDescription()
    {
        return 'Online Transfer Test';
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferBeneficiaryAccountName()
    {
        return 'John';
    }
}
