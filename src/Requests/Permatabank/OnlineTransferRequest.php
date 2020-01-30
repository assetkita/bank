<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\OnlineTransferSubject;
use Assetku\BankService\Requests\Contracts\MustValidated;
use Assetku\BankService\Requests\Contracts\OnlineTransferRequest as OnlineTransferRequestContract;
use Assetku\BankService\Requests\Permatabank\Encoders\JsonEncoder;
use Assetku\BankService\Requests\Permatabank\Headers\CommonHeader;

class OnlineTransferRequest extends Request implements OnlineTransferRequestContract, MustValidated
{
    /**
     * @var string
     */
    protected $fromAccount;

    /**
     * @var string
     */
    protected $fromAccountName;

    /**
     * @var string
     */
    protected $fromBankName;

    /**
     * @var string
     */
    protected $toAccount;

    /**
     * @var string
     */
    protected $toBankId;

    /**
     * @var string
     */
    protected $toBankName;

    /**
     * @var string
     */
    protected $beneficiaryAccountName;

    /**
     * @var int|float|double
     */
    protected $amount;

    /**
     * @var string
     */
    protected $transactionDescription;

    /**
     * @var string
     */
    protected $chargeTo = '0';

    /**
     * OnlineTransferRequest constructor.
     *
     * @param  OnlineTransferSubject  $subject
     */
    public function __construct(OnlineTransferSubject $subject)
    {
        parent::__construct();

        $this->fromAccount = $subject->onlineTransferFromAccount();

        $this->fromAccountName = $subject->onlineTransferFromAccountName();

        $this->fromBankName = $subject->onlineTransferFromBankName();

        $this->toAccount = $subject->onlineTransferToAccount();

        $this->toBankId = $subject->onlineTransferToBankId();

        $this->toBankName = $subject->onlineTransferToBankName();

        $this->beneficiaryAccountName = $subject->onlineTransferBeneficiaryAccountName();

        $this->amount = $subject->onlineTransferAmount();

        $this->transactionDescription = $subject->onlineTransferTransactionDescription();
    }

    /**
     * @inheritDoc
     */
    public function fromAccount()
    {
        return $this->fromAccount;
    }

    /**
     * @inheritDoc
     */
    public function fromAccountName()
    {
        return $this->fromAccountName;
    }

    /**
     * @inheritDoc
     */
    public function fromBankName()
    {
        return $this->fromBankName;
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
    public function toBankId()
    {
        return $this->toBankId;
    }

    /**
     * @inheritDoc
     */
    public function toBankName()
    {
        return $this->toBankName;
    }

    /**
     * @inheritDoc
     */
    public function beneficiaryAccountName()
    {
        return $this->beneficiaryAccountName;
    }

    /**
     * @inheritDoc
     */
    public function amount()
    {
        return $this->amount;
    }

    /**
     * @inheritDoc
     */
    public function transactionDescription()
    {
        return $this->transactionDescription;
    }

    /**
     * @inheritDoc
     */
    public function chargeTo()
    {
        return $this->chargeTo;
    }

    /**
     * @inheritDoc
     */
    public function method()
    {
        return 'POST';
    }

    /**
     * @inheritDoc
     */
    public function uri()
    {
        return 'BankingServices/InterBankTransfer/add';
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
            'OlXferAddRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferenceId,
                ],
                'XferInfo' => [
                    'FromAccount'   => $this->fromAccount,
                    'ToAccount'     => $this->toAccount,
                    'ToBankId'      => $this->toBankId,
                    'ToBankName'    => $this->toBankName,
                    'Amount'        => $this->amount,
                    'ChargeTo'      => $this->chargeTo,
                    'TrxDesc'       => $this->transactionDescription,
                    'BenefAcctName' => $this->beneficiaryAccountName,
                    'FromAcctName'  => $this->fromAccountName,
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
            'OlXferAddRq'                           => 'required|array|size:2',
            'OlXferAddRq.MsgRqHdr'                  => 'required|array|size:2',
            'OlXferAddRq.MsgRqHdr.RequestTimestamp' => 'required|string|date',
            'OlXferAddRq.MsgRqHdr.CustRefID'        => 'required|string|size:20',
            'OlXferAddRq.XferInfo'                  => 'required|array|size:9',
            'OlXferAddRq.XferInfo.FromAccount'      => 'required|string|between:9,18',
            'OlXferAddRq.XferInfo.ToAccount'        => 'required|string|between:9,18',
            'OlXferAddRq.XferInfo.ToBankId'         => 'required|string|between:3,7',
            'OlXferAddRq.XferInfo.Amount'           => 'required|numeric|between:1000,25000000',
            'OlXferAddRq.XferInfo.ChargeTo'         => 'required|string|size:1|in:0',
            'OlXferAddRq.XferInfo.TrxDesc'          => 'required|string',
            'OlXferAddRq.XferInfo.BenefAcctName'    => 'required|string|min:3',
            'OlXferAddRq.XferInfo.FromAcctName'     => 'required|string|min:3',
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
            'OlXferAddRq'                           => 'online transfer',
            'OlXferAddRq.MsgRqHdr'                  => 'header permintaan pesan',
            'OlXferAddRq.MsgRqHdr.RequestTimestamp' => 'timestamp',
            'OlXferAddRq.MsgRqHdr.CustRefID'        => 'id referensi pelanggan',
            'OlXferAddRq.XferInfo'                  => 'info transfer',
            'OlXferAddRq.XferInfo.FromAccount'      => 'rekening pengirim',
            'OlXferAddRq.XferInfo.ToAccount'        => 'rekening penerima',
            'OlXferAddRq.XferInfo.ToBankId'         => 'id bank penerima',
            'OlXferAddRq.XferInfo.Amount'           => 'jumlah',
            'OlXferAddRq.XferInfo.CurrencyCode'     => 'kode mata uang',
            'OlXferAddRq.XferInfo.ChargeTo'         => 'dibiayakan',
            'OlXferAddRq.XferInfo.TrxDesc'          => 'deskripsi transaksi',
            'OlXferAddRq.XferInfo.BenefAcctName'    => 'nama rekening penerima',
            'OlXferAddRq.XferInfo.FromAcctName'     => 'nama rekening pengirim',
        ];
    }
}
