<?php

namespace Assetku\BankService\Contracts\SubmitApplicationDocument;

use Assetku\BankService\Contracts\Base\BaseRequestContract;

interface SubmitApplicationDocumentRequestContract extends BaseRequestContract
{
    /**
     * Get submit application document request's bank referral id
     *
     * @return string
     */
    public function bankReferralId();

    /**
     * Get submit application document request's document type
     *
     * @return string
     */
    public function documentType();

    /**
     * Get submit application document request's document name
     *
     * @return string
     */
    public function documentName();

    /**
     * Get submit application document request's document content
     *
     * @return string
     */
    public function documentContent();

    /**
     * Get submit application document request's document content type
     *
     * @return string
     */
    public function documentContentType();
}
