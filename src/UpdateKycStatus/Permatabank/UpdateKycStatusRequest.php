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
     * @var array
     */
    protected $data;

    /**
     * UpdateKycStatusRequest constructor.
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
