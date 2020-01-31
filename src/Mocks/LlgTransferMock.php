<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\Subjects\LlgTransferSubject;

class LlgTransferMock implements LlgTransferSubject
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
     * LlgTransferMock constructor.
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
    public function llgTransferFromAccount()
    {
        return $this->fromAccount;
    }

    /**
     * @inheritDoc
     */
    public function llgTransferFromAccountName()
    {
        return 'Operational Account';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferFromBankName()
    {
        return 'BANK PERMATA';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferToAccount()
    {
        return '701075323';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferToAccountName()
    {
        return 'John Doe';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferToBankId()
    {
        return '90010';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferToBankName()
    {
        return 'BANK BNI';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferAmount()
    {
        return $this->amount;
    }

    /**
     * @inheritDoc
     */
    public function llgTransferTransactionDescription()
    {
        return 'Pencairan pinjaman';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferBeneficiaryAccountName()
    {
        return 'John Doe';
    }
}
