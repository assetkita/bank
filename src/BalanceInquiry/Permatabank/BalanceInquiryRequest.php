<?php

namespace Assetku\BankService\BalanceInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\BalanceInquiry\BalanceInquiryRequestContract;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Encoders\Permatabank\JsonEncoderUnescapedSlashes;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class BalanceInquiryRequest extends BaseRequest implements BalanceInquiryRequestContract, MustValidated
{
    /**
     * @var string
     */
    protected $accountNumber;

    /**
     * BalanceInquiryRequest constructor.
     *
     * @param  string  $accountNumber
     */
    public function __construct(string $accountNumber)
    {
        parent::__construct();

        $this->accountNumber = $accountNumber;
    }

    /**
     * @inheritDoc
     */
    public function accountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'InquiryServices/BalanceInfo/inq';
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
            'BalInqRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferralId,
                ],
                'InqInfo'  => [
                    'AccountNumber' => $this->accountNumber,
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
            'BalInqRq'                           => 'required|array|size:2',
            'BalInqRq.MsgRqHdr'                  => 'required|array|size:2',
            'BalInqRq.MsgRqHdr.RequestTimestamp' => 'required|string|date',
            'BalInqRq.MsgRqHdr.CustRefID'        => 'required|string|size:20',
            'BalInqRq.InqInfo'                   => 'required|array|size:1',
            'BalInqRq.InqInfo.AccountNumber'     => 'required|string|between:9,18',
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
            'BalInqRq'                           => 'balance inquiry',
            'BalInqRq.MsgRqHdr'                  => 'header permintaan pesan',
            'BalInqRq.MsgRqHdr.RequestTimestamp' => 'timestamp',
            'BalInqRq.MsgRqHdr.CustRefID'        => 'id referensi pelanggan',
            'BalInqRq.InqInfo'                   => 'info inquiry',
            'BalInqRq.InqInfo.AccountNumber'     => 'nomor rekening',
        ];
    }
}
