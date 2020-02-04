<?php

namespace Assetku\BankService\SubmitApplicationData\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\SubmitApplicationData\SubmitApplicationDataRequestContract;
use Assetku\BankService\Contracts\SubmitApplicationData\Request\PersonalInfo;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Contracts\Subjects\SubmitFintechAccountSubject;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class SubmitApplicationDataRequest extends BaseRequest implements SubmitApplicationDataRequestContract, MustValidated
{
    /**
     * @var string
     */
    protected $referralCode;

    /**
     * @var PersonalInfo
     */
    protected $personalInfo;

    /**
     * @var array
     */
    protected $data;

    /**
     * SubmitApplicationDataRequest constructor.
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
    public function referralCode()
    {
        return $this->referralCode;
    }

    /**
     * @inheritDoc
     */
    public function personalInfo()
    {
        return $this->personalInfo;
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'appldata_v2/add';
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
            'SubmitApplicationRq' => [
                'MsgRqHdr'        => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferralId,
                ],
                'ApplicationInfo' => $this->data,
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
