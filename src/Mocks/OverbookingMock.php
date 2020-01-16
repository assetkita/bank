<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\OverbookingSubject;

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
        return 'Agung';
    }

    /**
     * @inheritDoc
     */
    public function overbookingFromBankName()
    {
        return 'Bank BNI';
    }

    /**
     * @inheritDoc
     */
    public function overbookingToAccount()
    {
        return '701075323';
    }

    /**
     * @inheritDoc
     */
    public function overbookingToBankName()
    {
        return 'Bank BNI';
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
        return 'Overbooking Test';
    }

    /**
     * @inheritDoc
     */
    public function overbookingBeneficiaryAccountName()
    {
        return 'Agung Trilaksono';
    }
}
