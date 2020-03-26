<?php

namespace Assetku\BankService\RiskRatingInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoderUnescapedSlashes;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class RiskRatingInquiryRequest extends BaseRequest implements RiskRatingInquiryRequestContract, MustValidated
{
    /**
     * @var string
     */
    protected $idNumber;

    /**
     * @var string
     */
    protected $employmentType;

    /**
     * @var string
     */
    protected $economySector;

    /**
     * @var string
     */
    protected $position;

    /**
     * RiskRatingInquiryRequest constructor.
     *
     * @param  string  $idNumber
     * @param  string  $employmentType
     * @param  string  $economySector
     * @param  string  $position
     */
    public function __construct(string $idNumber, string $employmentType, string $economySector, string $position)
    {
        parent::__construct();

        $this->idNumber = $idNumber;

        $this->employmentType = $employmentType;

        $this->economySector = $economySector;

        $this->position = $position;
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
    public function employmentType()
    {
        return $this->employmentType;
    }

    /**
     * @inheritDoc
     */
    public function economySector()
    {
        return $this->economySector;
    }

    /**
     * @inheritDoc
     */
    public function position()
    {
        return $this->position;
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'appldata_v2/riskrating/inq';
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
            'InquiryHighRiskRq' => [
                'MsgRqHdr'        => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferralId,
                ],
                'ApplicationInfo' => [
                    'IdNumber'       => $this->idNumber,
                    'EmploymentType' => $this->employmentType,
                    'EconomySector'  => $this->economySector,
                    'Position'       => $this->position,
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
            'InquiryHighRiskRq'                                => 'required|array|size:2',
            'InquiryHighRiskRq.MsgRqHdr'                       => 'required|array|size:2',
            'InquiryHighRiskRq.MsgRqHdr.RequestTimestamp'      => 'required|string|date',
            'InquiryHighRiskRq.MsgRqHdr.CustRefID'             => 'required|string|size:20',
            'InquiryHighRiskRq.ApplicationInfo'                => 'required|array|size:4',
            'InquiryHighRiskRq.ApplicationInfo.IdNumber'       => 'required|string|size:16',
            'InquiryHighRiskRq.ApplicationInfo.EmploymentType' => 'required|string|in:A,B,C,D,E,F,G,H,I',
            'InquiryHighRiskRq.ApplicationInfo.EconomySector'  => 'required|string|size:3',
            'InquiryHighRiskRq.ApplicationInfo.Position'       => 'required|string|min:3',
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
            'InquiryHighRiskRq'                                => 'inquiry high risk request',
            'InquiryHighRiskRq.MsgRqHdr'                       => 'header permintaan pesan',
            'InquiryHighRiskRq.MsgRqHdr.RequestTimestamp'      => 'timestamp',
            'InquiryHighRiskRq.MsgRqHdr.CustRefID'             => 'id referral pelanggan',
            'InquiryHighRiskRq.ApplicationInfo'                => 'info aplikasi',
            'InquiryHighRiskRq.ApplicationInfo.IdNumber'       => 'nomor identifikasi',
            'InquiryHighRiskRq.ApplicationInfo.EmploymentType' => 'jenis kepegawaian',
            'InquiryHighRiskRq.ApplicationInfo.EconomySector'  => 'sektor ekonomi',
            'InquiryHighRiskRq.ApplicationInfo.Position'       => 'jabatan',
        ];
    }
}
