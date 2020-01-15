<?php

namespace Assetku\BankService\Services;

use Assetku\BankService\Contracts\LlgTransferSubject;
use Assetku\BankService\Contracts\OnlineTransferSubject;
use Assetku\BankService\Contracts\OverbookingSubject;
use Assetku\BankService\Contracts\RtgsTransferSubject;
use Assetku\BankService\Exceptions\BankValidatorException;
use Assetku\BankService\Exceptions\PermatabankExceptions\BalanceInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\LlgTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\RtgsTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\StatusTransactionInquiryException;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\BalanceInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\OnlineTransferInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\OverbookingInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\StatusTransactionInquiry;
use Assetku\BankService\Transfer\Permatabank\LlgTransfer;
use Assetku\BankService\Transfer\Permatabank\OnlineTransfer;
use Assetku\BankService\Transfer\Permatabank\Overbooking;
use Assetku\BankService\Transfer\Permatabank\RtgsTransfer;
use GuzzleHttp\Exception\GuzzleException;

interface Disbursement
{
    /**
     * Perform status transaction inquiry
     *
     * @param  string  $customerReferenceId
     * @return StatusTransactionInquiry
     * @throws GuzzleException
     * @throws StatusTransactionInquiryException
     */
    public function statusTransactionInquiry(string $customerReferenceId);

    /**
     * Perform balance inquiry
     *
     * @param  string  $accountNumber
     * @return BalanceInquiry
     * @throws GuzzleException
     * @throws BalanceInquiryException
     */
    public function balanceInquiry(string $accountNumber);

    /**
     * Perform overbooking inquiry
     *
     * @param  string  $accountNumber
     * @return OverbookingInquiry
     * @throws GuzzleException
     * @throws OverbookingInquiryException
     */
    public function overbookingInquiry(string $accountNumber);

    /**
     * Perform online transfer inquiry
     *
     * @param  string  $toAccount
     * @param  string  $bankId
     * @param  string  $bankName
     * @return OnlineTransferInquiry
     * @throws GuzzleException
     * @throws OnlineTransferInquiryException
     */
    public function onlineTransferInquiry(string $toAccount, string $bankId, string $bankName);

    /**
     * Perform overbooking
     *
     * @param  OverbookingSubject  $subject
     * @return Overbooking
     * @throws GuzzleException
     * @throws OverbookingInquiryException
     * @throws OverbookingException
     */
    public function overbooking(OverbookingSubject $subject);

    /**
     * Perform online transfer
     *
     * @param  OnlineTransferSubject  $subject
     * @return OnlineTransfer
     * @throws BankValidatorException
     * @throws GuzzleException
     * @throws OnlineTransferInquiryException
     * @throws OnlineTransferException
     */
    public function onlineTransfer(OnlineTransferSubject $subject);

    /**
     * Perform LLG transfer
     *
     * @param  LlgTransferSubject  $subject
     * @return LlgTransfer
     * @throws BankValidatorException
     * @throws GuzzleException
     * @throws LlgTransferException
     */
    public function llgTransfer(LlgTransferSubject $subject);

    /**
     * Perform RTGS transfer
     *
     * @param  RtgsTransferSubject  $subject
     * @return RtgsTransfer
     * @throws BankValidatorException
     * @throws GuzzleException
     * @throws RtgsTransferException
     */
    public function rtgsTransfer(RtgsTransferSubject $subject);
}
