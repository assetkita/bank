<?php

namespace Assetku\BankService\ApplicationStatusInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class ApplicationStatusInquiryRequest extends BaseRequest implements ApplicationStatusInquiryRequestContract
{
    /**
     * @param array $data
     */
    protected $data;

    /**
     * ApplicationStatusInquiryRequest constructor.
     *
     * @param  array  $data
     */
    public function __construct(array $data)
    {
        parent::__construct();

        $this->data = $data;
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'appldata_v2/inq';
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
            'InquiryApplicationRq' => [
                'MsgRqHdr'              => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferralId
                ],
                'SubmitApplicationInfo' => [
                    'ReffCode' => $this->data
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
