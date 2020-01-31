<?php

namespace Assetku\BankService\Requests\Permatabank;

use Assetku\BankService\Contracts\Requests\MustValidated;
use Assetku\BankService\Contracts\Requests\RtgsTransferRequest as RtgsTransferRequestContract;
use Assetku\BankService\Contracts\Subjects\RtgsTransferSubject;
use Assetku\BankService\Encoders\Permatabank\JsonEncoder;
use Assetku\BankService\Headers\Permatabank\CommonHeader;

class RtgsTransferRequest extends Request implements RtgsTransferRequestContract, MustValidated
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
     * RtgsTransferRequest constructor.
     *
     * @param  RtgsTransferSubject  $subject
     */
    public function __construct(RtgsTransferSubject $subject)
    {
        parent::__construct();

        $this->fromAccount = $subject->rtgsTransferFromAccount();

        $this->fromAccountName = $subject->rtgsTransferFromAccountName();

        $this->fromBankName = $subject->rtgsTransferFromBankName();

        $this->toAccount = $subject->rtgsTransferToAccount();

        $this->toAccountName = $subject->rtgsTransferToAccountName();

        $this->toBankId = $subject->rtgsTransferToBankId();

        $this->toBankName = $subject->rtgsTransferToBankName();

        $this->beneficiaryAccountName = $subject->rtgsTransferBeneficiaryAccountName();

        $this->amount = $subject->rtgsTransferAmount();

        $this->transactionDescription = $subject->rtgsTransferTransactionDescription();
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
        return 'BankingServices/RtgsTransfer/add';
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
            'RtgsXferAddRq' => [
                'MsgRqHdr' => [
                    'RequestTimestamp' => $this->timestamp,
                    'CustRefID'        => $this->customerReferenceId,
                ],
                'XferInfo' => [
                    'FromAccount'         => $this->fromAccount,
                    'FromAcctName'        => $this->fromAccountName,
                    'ToAccount'           => $this->toAccount,
                    'ToBankId'            => $this->toBankId,
                    'ToBankName'          => $this->toBankName,
                    'BenefType'           => $this->beneficiaryType,
                    'BenefAcctName'       => $this->beneficiaryAccountName,
                    'BenefBankAddress'    => $this->beneficiaryBankAddress,
                    'BenefBankBranchName' => $this->beneficiaryBankBranchName,
                    'BenefBankCity'       => $this->beneficiaryBankCity,
                    'Amount'              => $this->amount,
                    'TrxDesc'             => $this->transactionDescription,
                    'ChargeTo'            => $this->chargeTo,
                    'CitizenStatus'       => $this->citizenStatus,
                    'ResidentStatus'      => $this->residentStatus,
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
            'RtgsXferAddRq'                              => 'required|array|size:2',
            'RtgsXferAddRq.MsgRqHdr'                     => 'required|array|size:2',
            'RtgsXferAddRq.MsgRqHdr.RequestTimestamp'    => 'required|string|date',
            'RtgsXferAddRq.MsgRqHdr.CustRefID'           => 'required|string|size:20',
            'RtgsXferAddRq.XferInfo'                     => 'required|array|size:15',
            'RtgsXferAddRq.XferInfo.FromAccount'         => 'required|string|between:9,18',
            'RtgsXferAddRq.XferInfo.ToAccount'           => 'required|string|between:9,18',
            'RtgsXferAddRq.XferInfo.ToBankId'            => 'required|string|between:3,7',
            'RtgsXferAddRq.XferInfo.ToBankName'          => 'required|string|min:3',
            'RtgsXferAddRq.XferInfo.Amount'              => 'required|numeric|min:100000000',
            'RtgsXferAddRq.XferInfo.ChargeTo'            => 'required|string|size:1|in:0',
            'RtgsXferAddRq.XferInfo.TrxDesc'             => 'required|string',
            'RtgsXferAddRq.XferInfo.CitizenStatus'       => 'required|string|size:1|in:0,1',
            'RtgsXferAddRq.XferInfo.ResidentStatus'      => 'required|string|size:1|in:0,1',
            'RtgsXferAddRq.XferInfo.BenefType'           => 'required|string|size:1|in:1,2',
            'RtgsXferAddRq.XferInfo.BenefAcctName'       => 'required|string|min:3,30',
            'RtgsXferAddRq.XferInfo.BenefBankAddress'    => 'required|string|min:1',
            'RtgsXferAddRq.XferInfo.BenefBankBranchName' => 'required|string|min:1',
            'RtgsXferAddRq.XferInfo.BenefBankCity'       => 'required|string|min:1',
            'RtgsXferAddRq.XferInfo.FromAcctName'        => 'required|string|min:3',
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
            'RtgsXferAddRq'                              => 'rtgs transfer',
            'RtgsXferAddRq.MsgRqHdr'                     => 'header permintaan pesan',
            'RtgsXferAddRq.MsgRqHdr.RequestTimestamp'    => 'timestamp',
            'RtgsXferAddRq.MsgRqHdr.CustRefID'           => 'id referensi pelanggan',
            'RtgsXferAddRq.XferInfo'                     => 'info transfer',
            'RtgsXferAddRq.XferInfo.FromAccount'         => 'rekening pengirim',
            'RtgsXferAddRq.XferInfo.ToAccount'           => 'rekening penerima',
            'RtgsXferAddRq.XferInfo.ToBankId'            => 'id bank penerima',
            'RtgsXferAddRq.XferInfo.ToBankName'          => 'nama bank penerima',
            'RtgsXferAddRq.XferInfo.Amount'              => 'jumlah',
            'RtgsXferAddRq.XferInfo.ChargeTo'            => 'dibiayakan',
            'RtgsXferAddRq.XferInfo.TrxDesc'             => 'deskripsi transaksi',
            'RtgsXferAddRq.XferInfo.CitizenStatus'       => 'status kewarganegaraan',
            'RtgsXferAddRq.XferInfo.ResidentStatus'      => 'status kependudukan',
            'RtgsXferAddRq.XferInfo.BenefType'           => 'jenis penerima',
            'RtgsXferAddRq.XferInfo.BenefAcctName'       => 'nama rekening penerima',
            'RtgsXferAddRq.XferInfo.BenefBankAddress'    => 'alamat bank penerima',
            'RtgsXferAddRq.XferInfo.BenefBankBranchName' => 'nama cabang bank penerima',
            'RtgsXferAddRq.XferInfo.BenefBankCity'       => 'kota bank penerima',
            'RtgsXferAddRq.XferInfo.FromAcctName'        => 'nama rekening pengirim',
        ];
    }
}
