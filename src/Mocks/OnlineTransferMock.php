<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\Subjects\OnlineTransferSubject;

class OnlineTransferMock implements OnlineTransferSubject
{
    /**
     * @var string
     */
    protected $fromAccount;

    /**
     * @var int|float|double
     */
    protected $amount;

    /**
     * OnlineTransferMock constructor.
     *
     * @param  string  $fromAccount
     * @param  int|float|double  $amount
     */
    public function __construct(string $fromAccount, $amount)
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
        return 'Operational Account';
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferFromBankName()
    {
        return 'BANK PERMATA';
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferToAccount()
    {
        return '701075323';
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferToAccountName()
    {
        return 'John Doe';
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
        return 'Pencairan pinjaman';
    }

    /**
     * @inheritDoc
     */
    public function onlineTransferBeneficiaryAccountName()
    {
        return 'John Doe';
    }
}
