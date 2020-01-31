<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\MustValidated;
use Assetku\BankService\Contracts\Requests\StatusTransactionInquiryRequest as StatusTransactionInquiryRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class StatusTransactionInquiryRequest extends Request implements StatusTransactionInquiryRequestContract, MustValidated
{
    /**
     * @var string
     */
    protected $customerReferenceId;

    /**
     * StatusTransactionInquiryRequest constructor.
     *
     * @param  string  $customerReferenceId
     */
    public function __construct(string $customerReferenceId)
    {
        parent::__construct();

        $this->customerReferenceId = $customerReferenceId;
    }

    /**
     * @inheritDoc
     */
    public function customerReferenceId()
    {
        return $this->customerReferenceId;
    }

    /**
     * @inheritDoc
     */
    public function method()
    {
        return 'POST';
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'InquiryServices/StatusTransaction/Service/inq';
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
            'StatusTransactionRq' => [
                'CorpID'    => \Config::get('bank.providers.permatabank.organization_name'),
                'CustRefID' => $this->customerReferenceId,
            ],
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
            'StatusTransactionRq'           => 'required|array|size:2',
            'StatusTransactionRq.CorpID'    => 'required|string',
            'StatusTransactionRq.CustRefID' => 'required|string|size:20',
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
            'StatusTransactionRq'           => 'status transaction inquiry',
            'StatusTransactionRq.CorpID'    => 'id perusahaan',
            'StatusTransactionRq.CustRefID' => 'id referensi pelanggan',
        ];
    }
}
