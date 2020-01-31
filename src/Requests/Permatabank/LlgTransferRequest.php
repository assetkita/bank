<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\LlgTransferRequest as LlgTransferRequestContract;
use Assetku\BankService\Contracts\Requests\MustValidated;
use Assetku\BankService\Contracts\Subjects\LlgTransferSubject;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class LlgTransferRequest extends Request implements LlgTransferRequestContract, MustValidated
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
    protected $beneficiaryType = '1';

    /**
     * @var string
     */
    protected $beneficiaryAccountName;

    /**
     * @var string
     */
    protected $beneficiaryBankBranchName = '-';

    /**
     * @var string
     */
    protected $beneficiaryBankAddress = '-';

    /**
     * @var string
     */
    protected $beneficiaryBankCity = '-';

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
     * @var string
     */
    protected $citizenStatus = '0';

    /**
     * @var string
     */
    protected $residentStatus = '0';

    /**
     * LlgTransferRequest constructor.
     *
     * @param  LlgTransferSubject  $subject
     */
    public function __construct(LlgTransferSubject $subject)
    {
        parent::__construct();

        $this->fromAccount = $subject->llgTransferFromAccount();

        $this->fromAccountName = $subject->llgTransferFromAccountName();

        $this->fromBankName = $subject->llgTransferFromBankName();

        $this->toAccount = $subject->llgTransferToAccount();

        $this->toBankId = $subject->llgTransferToBankId();

        $this->toBankName = $subject->llgTransferToBankName();

        $this->beneficiaryAccountName = $subject->llgTransferBeneficiaryAccountName();

        $this->amount = $subject->llgTransferAmount();

        $this->transactionDescription = $subject->llgTransferTransactionDescription();
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
    public function beneficiaryType()
    {
        return $this->beneficiaryType;
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
    public function beneficiaryBankBranchName()
    {
        return $this->beneficiaryBankBranchName;
    }

    /**
     * @inheritDoc
     */
    public function beneficiaryBankAddress()
    {
        return $this->beneficiaryBankAddress;
    }

    /**
     * @inheritDoc
     */
    public function beneficiaryBankCity()
    {
        return $this->beneficiaryBankCity;
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
    public function citizenStatus()
    {
        return $this->citizenStatus;
    }

    /**
     * @inheritDoc
     */
    public function residentStatus()
    {
        return $this->residentStatus;
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
        return 'BankingServices/LlgTransfer/add';
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
            'LlgXferAddRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferenceId,
                ],
                'XferInfo' => [
                    'FromAccount'         => $this->fromAccount,
                    'ToAccount'           => $this->toAccount,
                    'ToBankId'            => $this->toBankId,
                    'ToBankName'          => $this->toBankName,
                    'Amount'              => $this->amount,
                    'ChargeTo'            => $this->chargeTo,
                    'TrxDesc'             => $this->transactionDescription,
                    'CitizenStatus'       => $this->citizenStatus,
                    'ResidentStatus'      => $this->residentStatus,
                    'BenefType'           => $this->beneficiaryType,
                    'BenefAcctName'       => $this->beneficiaryAccountName,
                    'BenefBankAddress'    => $this->beneficiaryBankAddress,
                    'BenefBankBranchName' => $this->beneficiaryBankBranchName,
                    'BenefBankCity'       => $this->beneficiaryBankCity,
                    'FromAcctName'        => $this->fromAccountName,
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
            'LlgXferAddRq'                              => 'required|array|size:2',
            'LlgXferAddRq.MsgRqHdr'                     => 'required|array|size:2',
            'LlgXferAddRq.MsgRqHdr.RequestTimestamp'    => 'required|string|date',
            'LlgXferAddRq.MsgRqHdr.CustRefID'           => 'required|string|size:20',
            'LlgXferAddRq.XferInfo'                     => 'required|array|size:15',
            'LlgXferAddRq.XferInfo.FromAccount'         => 'required|string|between:9,18',
            'LlgXferAddRq.XferInfo.ToAccount'           => 'required|string|between:9,18',
            'LlgXferAddRq.XferInfo.ToBankId'            => 'required|string|between:3,7',
            'LlgXferAddRq.XferInfo.ToBankName'          => 'required|string|min:3',
            'LlgXferAddRq.XferInfo.Amount'              => 'required|numeric|between:1000,1000000000',
            'LlgXferAddRq.XferInfo.ChargeTo'            => 'required|string|size:1|in:0',
            'LlgXferAddRq.XferInfo.TrxDesc'             => 'required|string',
            'LlgXferAddRq.XferInfo.CitizenStatus'       => 'required|string|size:1|in:0,1',
            'LlgXferAddRq.XferInfo.ResidentStatus'      => 'required|string|size:1|in:0,1',
            'LlgXferAddRq.XferInfo.BenefType'           => 'required|string|size:1|in:1,2',
            'LlgXferAddRq.XferInfo.BenefAcctName'       => 'required|string|min:3,30',
            'LlgXferAddRq.XferInfo.BenefBankAddress'    => 'required|string|min:1',
            'LlgXferAddRq.XferInfo.BenefBankBranchName' => 'required|string|min:1',
            'LlgXferAddRq.XferInfo.BenefBankCity'       => 'required|string|min:1',
            'LlgXferAddRq.XferInfo.FromAcctName'        => 'required|string|min:3',
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
            'LlgXferAddRq'                              => 'llg transfer',
            'LlgXferAddRq.MsgRqHdr'                     => 'header permintaan pesan',
            'LlgXferAddRq.MsgRqHdr.RequestTimestamp'    => 'timestamp',
            'LlgXferAddRq.MsgRqHdr.CustRefID'           => 'id referensi pelanggan',
            'LlgXferAddRq.XferInfo'                     => 'info transfer',
            'LlgXferAddRq.XferInfo.FromAccount'         => 'rekening pengirim',
            'LlgXferAddRq.XferInfo.ToAccount'           => 'rekening penerima',
            'LlgXferAddRq.XferInfo.ToBankId'            => 'id bank penerima',
            'LlgXferAddRq.XferInfo.ToBankName'          => 'nama bank penerima',
            'LlgXferAddRq.XferInfo.Amount'              => 'jumlah',
            'LlgXferAddRq.XferInfo.ChargeTo'            => 'dibiayakan',
            'LlgXferAddRq.XferInfo.TrxDesc'             => 'deskripsi transaksi',
            'LlgXferAddRq.XferInfo.CitizenStatus'       => 'status kewarganegaraan',
            'LlgXferAddRq.XferInfo.ResidentStatus'      => 'status kependudukan',
            'LlgXferAddRq.XferInfo.BenefType'           => 'jenis penerima',
            'LlgXferAddRq.XferInfo.BenefAcctName'       => 'nama rekening penerima',
            'LlgXferAddRq.XferInfo.BenefBankAddress'    => 'alamat bank penerima',
            'LlgXferAddRq.XferInfo.BenefBankBranchName' => 'nama cabang bank penerima',
            'LlgXferAddRq.XferInfo.BenefBankCity'       => 'kota bank penerima',
            'LlgXferAddRq.XferInfo.FromAcctName'        => 'nama rekening pengirim',
        ];
    }
}
