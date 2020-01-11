<?php

namespace Assetku\BankService\Exceptions\PermatabankExceptions;

use Illuminate\Http\Response;

class OnlineTransferInquiryException extends DisbursementException
{
    /**
     * Display error for service unavailable
     *
     * @return OnlineTransferInquiryException
     */
    public static function serviceUnavailable()
    {
        return new static('Server permata bank sedang dalam perbaikan.', Response::HTTP_SERVICE_UNAVAILABLE);
    }

    /**
     * Display error for internal server error
     *
     * @return OnlineTransferInquiryException
     */
    public static function internalServerError()
    {
        return new static('Kesalahan dari server permata bank.', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display error for forbidden
     *
     * @param  string  $code
     * @return OnlineTransferInquiryException
     */
    public static function forbidden($code)
    {
        $message = static::translateError($code);

        return new static($message, Response::HTTP_FORBIDDEN);
    }

    /**
     * Display error for unauthorized
     *
     * @param  string  $code
     * @return OnlineTransferInquiryException
     */
    public static function unauthorized($code)
    {
        $message = static::translateError($code);

        return new static($message, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Display error for unknown error
     *
     * @return OnlineTransferInquiryException
     */
    public static function unknownError()
    {
        return new static('Kesalahan tidak dikenali.', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
