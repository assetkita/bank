<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\Subjects\RtgsTransferSubject;

class RtgsTransferMock implements RtgsTransferSubject
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
     * RtgsTransferMock constructor.
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
    public function rtgsTransferFromAccount()
    {
        return $this->fromAccount;
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferFromAccountName()
    {
        return 'Operational Account';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferFromBankName()
    {
        return 'BANK PERMATA';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferToAccount()
    {
        return '701075323';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferToAccountName()
    {
        return 'John Doe';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferToBankId()
    {
        return '90010';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferToBankName()
    {
        return 'BANK BNI';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferAmount()
    {
        return $this->amount;
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferTransactionDescription()
    {
        return 'Pencairan pinjaman';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferBeneficiaryAccountName()
    {
        return 'John Doe';
    }
}
