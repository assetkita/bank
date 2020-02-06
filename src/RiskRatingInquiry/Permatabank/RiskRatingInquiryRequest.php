<?php

namespace Assetku\BankService\RiskRatingInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\RiskRatingInquiry\RiskRatingInquiryRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class RiskRatingInquiryRequest extends BaseRequest implements RiskRatingInquiryRequestContract
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
        return new JsonEncoder;
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
