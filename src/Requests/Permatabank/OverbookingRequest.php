<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\OverbookingSubject;
use Assetku\BankService\Requests\Contracts\MustValidated;
use Assetku\BankService\Requests\Contracts\OverbookingRequest as OverbookingRequestContract;
use Assetku\BankService\Requests\Permatabank\Encoders\JsonEncoder;
use Assetku\BankService\Requests\Permatabank\Headers\CommonHeader;

class OverbookingRequest extends Request implements OverbookingRequestContract, MustValidated
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
    protected $toAccountName;

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
    protected $currencyCode = 'IDR';

    /**
     * @var string
     */
    protected $chargeTo = '0';

    /**
     * OverbookingRequest constructor.
     *
     * @param  OverbookingSubject  $subject
     */
    public function __construct(OverbookingSubject $subject)
    {
        parent::__construct();

        $this->fromAccount = $subject->overbookingFromAccount();

        $this->fromAccountName = $subject->overbookingFromAccountName();

        $this->fromBankName = $subject->overbookingFromBankName();

        $this->toAccount = $subject->overbookingToAccount();

        $this->toAccountName = $subject->overbookingToAccountName();

        $this->toBankName = $subject->overbookingToBankName();

        $this->beneficiaryAccountName = $subject->overbookingBeneficiaryAccountName();

        $this->amount = $subject->overbookingAmount();

        $this->transactionDescription = $subject->overbookingTransactionDescription();
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
    public function toAccountName()
    {
        return $this->toAccountName;
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
    public function currencyCode()
    {
        return $this->currencyCode;
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
        return 'BankingServices/FundsTransfer/add';
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
            'XferAddRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferenceId,
                ],
                'XferInfo' => [
                    'FromAccount'   => $this->fromAccount,
                    'ToAccount'     => $this->toAccount,
                    'Amount'        => $this->amount,
                    'CurrencyCode'  => $this->currencyCode,
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
            'XferAddRq'                           => 'required|array|size:2',
            'XferAddRq.MsgRqHdr'                  => 'required|array|size:2',
            'XferAddRq.MsgRqHdr.RequestTimestamp' => 'required|string|date',
            'XferAddRq.MsgRqHdr.CustRefID'        => 'required|string|size:20',
            'XferAddRq.XferInfo'                  => 'required|array|size:8',
            'XferAddRq.XferInfo.FromAccount'      => 'required|string|between:9,18',
            'XferAddRq.XferInfo.ToAccount'        => 'required|string|between:9,18',
            'XferAddRq.XferInfo.Amount'           => 'required|numeric|min:1000',
            'XferAddRq.XferInfo.CurrencyCode'     => 'required|string|size:3',
            'XferAddRq.XferInfo.ChargeTo'         => 'required|string|size:1|in:0',
            'XferAddRq.XferInfo.TrxDesc'          => 'required|string',
            'XferAddRq.XferInfo.BenefAcctName'    => 'required|string|min:3',
            'XferAddRq.XferInfo.FromAcctName'     => 'required|string|min:3',
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
            'XferAddRq'                           => 'overbooking',
            'XferAddRq.MsgRqHdr'                  => 'header permintaan pesan',
            'XferAddRq.MsgRqHdr.RequestTimestamp' => 'timestamp',
            'XferAddRq.MsgRqHdr.CustRefID'        => 'id referensi pelanggan',
            'XferAddRq.XferInfo'                  => 'info transfer',
            'XferAddRq.XferInfo.FromAccount'      => 'rekening pengirim',
            'XferAddRq.XferInfo.ToAccount'        => 'rekening penerima',
            'XferAddRq.XferInfo.Amount'           => 'jumlah',
            'XferAddRq.XferInfo.CurrencyCode'     => 'kode mata uang',
            'XferAddRq.XferInfo.ChargeTo'         => 'dibiayakan',
            'XferAddRq.XferInfo.TrxDesc'          => 'deskripsi transaksi',
            'XferAddRq.XferInfo.BenefAcctName'    => 'nama rekening penerima',
            'XferAddRq.XferInfo.FromAcctName'     => 'nama rekening pengirim',
        ];
    }
}
