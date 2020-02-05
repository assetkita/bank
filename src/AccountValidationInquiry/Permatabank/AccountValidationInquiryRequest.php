<?php

namespace Assetku\BankService\AccountValidationInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\AccountValidationInquiry\AccountValidationInquiryRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class AccountValidationInquiryRequest extends BaseRequest implements AccountValidationInquiryRequestContract
{
    /**
     * @var string
     */
    protected $referralCode;
    /**
     * @var string
     */
    protected $accountNumber;
    /**
     * @var string
     */
    protected $idNumber;
    /**
     * @var string
     */
    protected $handPhoneNumber;
    /**
     * @var string
     */
    protected $customerName;
    /**
     * @var string
     */
    protected $dateOfBirth;
    /**
     * @var string
     */
    protected $cityOfBirth;

    /**
     * @inheritDoc
     */
    public function accountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @inheritDoc
     */
    public function idNumber()
    {
        return $this->idNumber;
    }

    /**
     * @inheritDoc
     */
    public function handPhoneNumber()
    {
        return $this->handPhoneNumber;
    }

    /**
     * @inheritDoc
     */
    public function customerName()
    {
        return $this->customerName;
    }

    /**
     * @inheritDoc
     */
    public function dateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * @inheritDoc
     */
    public function cityOfBirth()
    {
        return $this->cityOfBirth;
    }

    /**
     * ApplicationStatusInquiryRequest constructor.
     *
     * @param  string  $accountNumber
     * @param  string  $idNumber
     * @param  string  $handPhoneNumber
     * @param  string  $customerName
     * @param  string  $dateOfBirth
     * @param  string  $cityOfBirth
     */
    public function __construct(
        string $accountNumber,
        string $idNumber,
        string $handPhoneNumber,
        string $customerName,
        string $dateOfBirth,
        string $cityOfBirth
    ) {
        parent::__construct();

        $this->accountNumber = $accountNumber;

        $this->idNumber = $idNumber;

        $this->handPhoneNumber = $handPhoneNumber;

        $this->customerName = $customerName;

        $this->dateOfBirth = $dateOfBirth;

        $this->cityOfBirth = $cityOfBirth;
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'appldata_v2/acctvalidation/inq';
    }

    /**
     * @inheritDoc
     */
    public function encoder()
    {
        return new JsonEncoder;
    }

    /**
     * @inheritDoc
     */
    public function data()
    {
        return [
            'InquiryAccountValidationRq' => [
                'MsgRqHdr'        => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferralId
                ],
                'ApplicationInfo' => [
                    'AccountNumber' => $this->accountNumber,
                    'IdNumber'      => $this->idNumber,
                    'HandphoneNo'   => $this->handPhoneNumber,
                    'CustomerName'  => $this->customerName,
                    'DateOfBirth'   => $this->dateOfBirth,
                    'CityOfBirth'   => $this->cityOfBirth,
                ]
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    public function header()
    {
        return new CommonHeader($this);
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        return [

        ];
    }

    /**
     * @inheritDoc
     */
    public function messages()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function customAttributes()
    {
        return [

        ];
    }
}
