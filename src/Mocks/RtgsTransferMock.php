<?php

namespace Assetku\BankService\Mocks;

use Assetku\BankService\Contracts\RtgsTransferSubject;

class RtgsTransferMock implements RtgsTransferSubject
{
    /**
     * @return string
     */
    public function fromAccount()
    {
        return '701075323';
    }

    /**
     * @return string
     */
    public function toAccount()
    {
        return '701075331';
    }

    /**
     * @return string
     */
    public function toBankId()
    {
        return '90010';
    }

    /**
     * @return string
     */
    public function toBankName()
    {
        return 'BNI';
    }

    /**
     * @return int
     */
    public function amount()
    {
        return 10000000000;
    }

    /**
     * @return
     */
    public function benefEmail()
    {
        return 'john@gmail.com';
    }

    /**
     * @return string
     */
    public function benefAccountName()
    {
        return 'john';
    }

    /**
     * @return string
     */
    public function benefPhoneNo()
    {
        return '0821222333467';
    }

    /**
     * @return string
     */
    public function benefBankAddress()
    {
        return 'JALAN JEND SUDIRMAN';
    }

    /**
     * @return string
     */
    public function benefBankBranchName()
    {
        return 'SUDIRMAN';
    }

    /**
     * @return string
     */
    public function benefBankCity()
    {
        return 'JAKARTA';
    }

    /**
     * @return string
     */
    public function fromAccountName()
    {
        return 'Doe';
    }

    /**
     * @return string
     */
    public function fromCurrencyCode()
    {
        return 'IDR';
    }

    /**
     * @return string
     */
    public function benefAddress1()
    {
        return 'jl Berkah no.14';
    }

    /**
     * @return string
     */
    public function benefAddress2()
    {
        return 'jl Berkah no.14';
    }

    /**
     * @return string
     */
    public function benefAddress3()
    {
        return 'jl Berkah no.14';
    }
}
