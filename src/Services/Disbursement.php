<?php

namespace Assetku\BankService\Services;

use Assetku\BankService\Contracts\BalanceInquirySubject;
use Assetku\BankService\Contracts\LlgTransferSubject;
use Assetku\BankService\Contracts\OnlineTransferInquirySubject;
use Assetku\BankService\Contracts\OnlineTransferSubject;
use Assetku\BankService\Contracts\OverbookingInquirySubject;
use Assetku\BankService\Contracts\OverbookingSubject;
use Assetku\BankService\Contracts\StatusTransactionInquirySubject;
use Assetku\BankService\Exceptions\PermatabankExceptions\BalanceInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\LlgTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OnlineTransferInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingException;
use Assetku\BankService\Exceptions\PermatabankExceptions\OverbookingInquiryException;
use Assetku\BankService\Exceptions\PermatabankExceptions\StatusTransactionInquiryException;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\BalanceInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\OnlineTransferInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\OverbookingInquiry;
use Assetku\BankService\Inquiry\Permatabank\Disbursement\StatusTransactionInquiry;
use Assetku\BankService\Transfer\Permatabank\LlgTransfer;
use Assetku\BankService\Transfer\Permatabank\OnlineTransfer;
use Assetku\BankService\Transfer\Permatabank\Overbooking;
use GuzzleHttp\Exception\GuzzleException;

interface Disbursement
{
    /**
     * Perform status transaction inquiry
     *
     * @param  StatusTransactionInquirySubject  $subject
     * @return StatusTransactionInquiry
     * @throws GuzzleException
     * @throws StatusTransactionInquiryException
     */
    public function statusTransactionInquiry(StatusTransactionInquirySubject $subject);

    /**
     * Perform balance inquiry
     *
     * @param  BalanceInquirySubject  $subject
     * @return BalanceInquiry
     * @throws GuzzleException
     * @throws BalanceInquiryException
     */
    public function balanceInquiry(BalanceInquirySubject $subject);

    /**
     * Perform overbooking inquiry
     *
     * @param  OverbookingInquirySubject  $subject
     * @return OverbookingInquiry
     * @throws GuzzleException
     * @throws OverbookingInquiryException
     */
    public function overbookingInquiry(OverbookingInquirySubject $subject);

    /**
     * Perform online transfer inquiry
     *
     * @param  OnlineTransferInquirySubject  $subject
     * @return OnlineTransferInquiry
     * @throws GuzzleException
     * @throws OnlineTransferInquiryException
     */
    public function onlineTransferInquiry(OnlineTransferInquirySubject $subject);

    /**
     * Perform overbooking
     *
     * @param  OverbookingSubject  $subject
     * @return Overbooking
     * @throws GuzzleException
     * @throws OverbookingException
     */
    public function overbooking(OverbookingSubject $subject);

    /**
     * Perform online transfer
     *
     * @param  OnlineTransferSubject  $subject
     * @return OnlineTransfer
     * @throws GuzzleException
     * @throws OnlineTransferException
     */
    public function onlineTransfer(OnlineTransferSubject $subject);

    /**
     * Perform LLG transfer
     *
     * @param  LlgTransferSubject  $subject
     * @return LlgTransfer
     * @throws GuzzleException
     * @throws LlgTransferException
     */
    public function llgTransfer(LlgTransferSubject $subject);
}
