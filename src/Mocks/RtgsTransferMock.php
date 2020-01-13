<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\RtgsTransferSubject;

class RtgsTransferMock implements RtgsTransferSubject
{
    /**
     * @inheritDoc
     */
    public function fromAccount()
    {
        return '701075323';
    }

    /**
     * @inheritDoc
     */
    public function toAccount()
    {
        return '701075331';
    }

    /**
     * @inheritDoc
     */
    public function toBankId()
    {
        return '90010';
    }

    /**
     * @inheritDoc
     */
    public function toBankName()
    {
        return 'BNI';
    }

    /**
     * @inheritDoc
     */
    public function amount()
    {
        return 10000000000;
    }

    /**
     * @inheritDoc
     */
    public function benefEmail()
    {
        return 'john@gmail.com';
    }

    /**
     * @inheritDoc
     */
    public function benefAccountName()
    {
        return 'john';
    }

    /**
     * @inheritDoc
     */
    public function benefPhoneNo()
    {
        return '0821222333467';
    }

    /**
     * @inheritDoc
     */
    public function benefBankAddress()
    {
        return 'JALAN JEND SUDIRMAN';
    }

    /**
     * @inheritDoc
     */
    public function benefBankBranchName()
    {
        return 'SUDIRMAN';
    }

    /**
     * @inheritDoc
     */
    public function benefBankCity()
    {
        return 'JAKARTA';
    }

    /**
     * @inheritDoc
     */
    public function fromAccountName()
    {
        return 'Doe';
    }

    /**
     * @inheritDoc
     */
    public function fromCurrencyCode()
    {
        return 'IDR';
    }

    /**
     * @inheritDoc
     */
    public function benefAddress1()
    {
        return 'jl Berkah no.14';
    }

    /**
     * @inheritDoc
     */
    public function benefAddress2()
    {
        return 'jl Berkah no.14';
    }

    /**
     * @inheritDoc
     */
    public function benefAddress3()
    {
        return 'jl Berkah no.14';
    }
}
