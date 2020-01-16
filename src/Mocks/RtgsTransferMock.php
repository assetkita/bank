<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\RtgsTransferSubject;

class RtgsTransferMock implements RtgsTransferSubject
{
    /**
     * @inheritDoc
     */
    public function rtgsTransferFromAccount()
    {
        return '701075323';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferFromAccountName()
    {
        return 'Doe';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferFromBankName()
    {
        return 'Bank BNI';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferToAccount()
    {
        return '701075331';
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
        return 'BNI';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferAmount()
    {
        return 10000000000;
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferTransactionDescription()
    {
        return 'RTGS Transfer Test';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferBeneficiaryAccountName()
    {
        return 'john';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferBeneficiaryBankAddress()
    {
        return 'JALAN JEND SUDIRMAN';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferBeneficiaryBankBranchName()
    {
        return 'SUDIRMAN';
    }

    /**
     * @inheritDoc
     */
    public function rtgsTransferBeneficiaryBankCity()
    {
        return 'JAKARTA';
    }
}
