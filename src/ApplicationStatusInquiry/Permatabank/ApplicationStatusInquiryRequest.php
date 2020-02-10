<?php

namespace Assetku\BankService\ApplicationStatusInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\ApplicationStatusInquiry\ApplicationStatusInquiryRequestContract;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class ApplicationStatusInquiryRequest extends BaseRequest implements ApplicationStatusInquiryRequestContract, MustValidated
{
    /**
     * @var string
     */
    protected $referralCode;

    /**
     * ApplicationStatusInquiryRequest constructor.
     *
     * @param  string  $referralCode
     */
    public function __construct(string $referralCode)
    {
        parent::__construct();

        $this->referralCode = $referralCode;
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
                    'ReffCode' => $this->referralCode,
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
            'InquiryApplicationRq'                                => 'required|array|size:2',
            'InquiryApplicationRq.MsgRqHdr'                       => 'required|array|size:2',
            'InquiryApplicationRq.MsgRqHdr.RequestTimestamp'      => 'required|string|date',
            'InquiryApplicationRq.MsgRqHdr.CustRefID'             => 'required|string|size:20',
            'InquiryApplicationRq.SubmitApplicationInfo'          => 'required|array|size:1',
            'InquiryApplicationRq.SubmitApplicationInfo.ReffCode' => 'required|string',
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
            'InquiryApplicationRq'                                => 'inquiry application request',
            'InquiryApplicationRq.MsgRqHdr'                       => 'header permintaan pesan',
            'InquiryApplicationRq.MsgRqHdr.RequestTimestamp'      => 'timestamp',
            'InquiryApplicationRq.MsgRqHdr.CustRefID'             => 'id referral pelanggan',
            'InquiryApplicationRq.SubmitApplicationInfo'          => 'info aplikasi pengajuan',
            'InquiryApplicationRq.SubmitApplicationInfo.ReffCode' => 'kode referral',
        ];
    }
}
