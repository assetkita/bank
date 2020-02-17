<?php

namespace Assetku\BankService\StatusTransactionInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Contracts\StatusTransactionInquiry\StatusTransactionInquiryRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoderUnescapedSlashes;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class StatusTransactionInquiryRequest extends BaseRequest implements StatusTransactionInquiryRequestContract, MustValidated
{
    /**
     * @var string
     */
    protected $corporationId;

    /**
     * @var string
     */
    protected $customerReferralId;

    /**
     * StatusTransactionInquiryRequest constructor.
     *
     * @param  string  $customerReferralId
     */
    public function __construct(string $customerReferralId)
    {
        $environment = \App::environment('production') ? 'production' : 'development';

        parent::__construct();

        $this->corporationId = \Config::get("bank.providers.permatabank.{$environment}.group_id");

        $this->customerReferralId = $customerReferralId;
    }

    /**
     * @inheritDoc
     */
    public function corporationId()
    {
        return $this->corporationId;
    }

    /**
     * @inheritDoc
     */
    public function customerReferralId()
    {
        return $this->customerReferralId;
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
        return new JsonEncoderUnescapedSlashes;
    }

    /**
     * @inheritDoc
     */
    public function data()
    {
        return [
            'StatusTransactionRq' => [
                'CorpID'    => $this->corporationId,
                'CustRefID' => $this->customerReferralId,
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
