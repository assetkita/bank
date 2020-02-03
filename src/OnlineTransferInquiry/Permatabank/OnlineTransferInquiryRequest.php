<?php

namespace Assetku\BankService\OnlineTransferInquiry\Permatabank;

use Assetku\BankService\Base\Permatabank\BaseRequest;
use Assetku\BankService\Contracts\MustValidated;
use Assetku\BankService\Contracts\OnlineTransferInquiry\OnlineTransferInquiryRequestContract;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class OnlineTransferInquiryRequest extends BaseRequest implements OnlineTransferInquiryRequestContract, MustValidated
{
    /**
     * @var string
     */
    protected $toAccount;

    /**
     * @var string
     */
    protected $bankId;

    /**
     * @var string
     */
    protected $bankName;

    /**
     * OnlineTransferInquiryRequest constructor.
     *
     * @param  string  $toAccount
     * @param  string  $bankId
     * @param  string  $bankName
     */
    public function __construct(string $toAccount, string $bankId, string $bankName)
    {
        parent::__construct();

        $this->toAccount = $toAccount;

        $this->bankId = $bankId;

        $this->bankName = $bankName;
    }

    /**
     * @inheritDoc
     */
    public function toAccount()
    {
        return $this->toAccount;
    }

    /**
     * @inheritDoc
     */
    public function bankId()
    {
        return $this->bankId;
    }

    /**
     * @inheritDoc
     */
    public function bankName()
    {
        return $this->bankName;
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'InquiryServices/OnlineXferInfo/inq';
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
            'OlXferInqRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferralId,
                ],
                'XferInfo' => [
                    'ToAccount' => $this->toAccount,
                    'BankId'    => $this->bankId,
                    'BankName'  => $this->bankName,
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
            'OlXferInqRq'                           => 'required|array|size:2',
            'OlXferInqRq.MsgRqHdr'                  => 'required|array|size:2',
            'OlXferInqRq.MsgRqHdr.RequestTimestamp' => 'required|string|date',
            'OlXferInqRq.MsgRqHdr.CustRefID'        => 'required|string|size:20',
            'OlXferInqRq.XferInfo'                  => 'required|array|size:3',
            'OlXferInqRq.XferInfo.ToAccount'        => 'required|string|between:9,18',
            'OlXferInqRq.XferInfo.BankId'           => 'required|string|between:3,7',
            'OlXferInqRq.XferInfo.BankName'         => 'required|string|min:3',
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
            'OlXferInqRq'                           => 'online transfer inquiry',
            'OlXferInqRq.MsgRqHdr'                  => 'header permintaan pesan',
            'OlXferInqRq.MsgRqHdr.RequestTimestamp' => 'timestamp',
            'OlXferInqRq.MsgRqHdr.CustRefID'        => 'id referensi pelanggan',
            'OlXferInqRq.XferInfo'                  => 'info transfer',
            'OlXferInqRq.XferInfo.ToAccount'        => 'nomor rekening tujuan',
            'OlXferInqRq.XferInfo.BankId'           => 'id bank tujuan',
            'OlXferInqRq.XferInfo.BankName'         => 'nama bank tujuan',
        ];
    }
}
