<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\Subjects\OverbookingSubject;

class OverbookingMock implements OverbookingSubject
{
    /**
     * @var string
     */
    protected $fromAccount;

    /**
     * OverbookingMock constructor.
     *
     * @param  string  $fromAccount
     */
    public function __construct(string $fromAccount)
    {
        $this->fromAccount = $fromAccount;
    }

    /**
     * @inheritDoc
     */
    public function overbookingFromAccount()
    {
        return $this->fromAccount;
    }

    /**
     * @inheritDoc
     */
    public function overbookingFromAccountName()
    {
        return 'Escrow Account';
    }

    /**
     * @inheritDoc
     */
    public function overbookingFromBankName()
    {
        return 'BANK PERMATA';
    }

    /**
     * @inheritDoc
     */
    public function overbookingToAccount()
    {
        return '4123561541';
    }

    /**
     * @inheritDoc
     */
    public function overbookingToAccountName()
    {
        return 'Operational Account';
    }

    /**
     * @inheritDoc
     */
    public function overbookingToBankName()
    {
        return 'BANK PERMATA';
    }

    /**
     * @inheritDoc
     */
    public function overbookingAmount()
    {
        return 21001;
    }

    /**
     * @inheritDoc
     */
    public function overbookingTransactionDescription()
    {
        return 'Admin Fee';
    }

    /**
     * @inheritDoc
     */
    public function overbookingBeneficiaryAccountName()
    {
        return 'PT. Assetku Mitra Bangsa';
    }
}
