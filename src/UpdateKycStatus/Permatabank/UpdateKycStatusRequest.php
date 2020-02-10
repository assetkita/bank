<?php

namespace Assetku\BankService\UpdateKycStatus\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Contracts\UpdateKycStatus\UpdateKycStatusRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class UpdateKycStatusRequest extends BaseRequest implements UpdateKycStatusRequestContract, MustValidated
{
    /**
     * @var string
     */
    protected $referralCode;

    /**
     * @var string
     */
    protected $idNumber;

    /**
     * @var string
     */
    protected $kycStatus;

    /**
     * UpdateKycStatusRequest constructor.
     *
     * @param  string  $referralCode
     * @param  string  $idNumber
     * @param  string  $kycStatus
     */
    public function __construct(string $referralCode, string $idNumber, string $kycStatus)
    {
        parent::__construct();

        $this->referralCode = $referralCode;

        $this->idNumber = $idNumber;

        $this->kycStatus = $kycStatus;
    }

    /**
     * @inheritDoc
     */
    public function referralCode()
    {
        return $this->referralCode;
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
    public function kycStatus()
    {
        return $this->kycStatus;
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'appldata_v2/kycstatus/add';
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
            'UpdateKycFlagRq' => [
                'MsgRqHdr'        => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferralId,
                ],
                'ApplicationInfo' => [
                    'ReffCode'  => $this->referralCode,
                    'IdNumber'  => $this->idNumber,
                    'KycStatus' => $this->kycStatus,
                ],
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
            'UpdateKycFlagRq'                           => 'required|array|size:2',
            'UpdateKycFlagRq.MsgRqHdr'                  => 'required|array|size:2',
            'UpdateKycFlagRq.MsgRqHdr.RequestTimestamp' => 'required|string|date',
            'UpdateKycFlagRq.MsgRqHdr.CustRefID'        => 'required|string|size:20',
            'UpdateKycFlagRq.ApplicationInfo'           => 'required|array|size:3',
            'UpdateKycFlagRq.ApplicationInfo.ReffCode'  => 'required|string',
            'UpdateKycFlagRq.ApplicationInfo.IdNumber'  => 'required|string|size:16',
            'UpdateKycFlagRq.ApplicationInfo.KycStatus' => 'required|string|in:00',
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
            'UpdateKycFlagRq'                           => 'update kyc status request',
            'UpdateKycFlagRq.MsgRqHdr'                  => 'header permintaan pesan',
            'UpdateKycFlagRq.MsgRqHdr.RequestTimestamp' => 'timestamp',
            'UpdateKycFlagRq.MsgRqHdr.CustRefID'        => 'id referral pelanggan',
            'UpdateKycFlagRq.ApplicationInfo'           => 'info aplikasi',
            'UpdateKycFlagRq.ApplicationInfo.ReffCode'  => 'referral code',
            'UpdateKycFlagRq.ApplicationInfo.IdNumber'  => 'nomor identifikasi',
            'UpdateKycFlagRq.ApplicationInfo.KycStatus' => 'status kyc',
        ];
    }
}
