<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\LlgTransferSubject;

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
    public function llgTransferFromAccount()
    {
        return $this->fromAccount;
    }

    /**
     * @inheritDoc
     */
    public function llgTransferFromAccountName()
    {
        return 'Doe';
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
    public function llgTransferToBankId()
    {
        return '90010';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferToBankName()
    {
        return 'BNI';
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
        return 'Llg Transfer Test';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferBeneficiaryAccountName()
    {
        return 'John';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferBeneficiaryBankAddress()
    {
        return 'JALAN JEND SUDIRMAN';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferBeneficiaryBankBranchName()
    {
        return 'SUDIRMAN';
    }

    /**
     * @inheritDoc
     */
    public function llgTransferBeneficiaryBankCity()
    {
        return 'JAKARTA';
    }
}
