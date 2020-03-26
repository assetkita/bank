<?php

namespace Assetku\BankService\UpdateKYCStatus\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Contracts\UpdateKYCStatus\UpdateKYCStatusRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoderUnescapedSlashes;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class UpdateKYCStatusRequest extends BaseRequest implements UpdateKYCStatusRequestContract, MustValidated
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
    protected $KYCStatus;

    /**
     * UpdateKYCStatusRequest constructor.
     *
     * @param  string  $referralCode
     * @param  string  $idNumber
     * @param  string  $KYCStatus
     */
    public function __construct(string $referralCode, string $idNumber, string $KYCStatus)
    {
        parent::__construct();

        $this->referralCode = $referralCode;

        $this->idNumber = $idNumber;

        $this->KYCStatus = $KYCStatus;
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
    public function KYCStatus()
    {
        return $this->KYCStatus;
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
        return new JsonEncoderUnescapedSlashes;
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
                    'KycStatus' => $this->KYCStatus,
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
            'UpdateKycFlagRq.ApplicationInfo.KycStatus' => 'required|string|in:00,01',
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
