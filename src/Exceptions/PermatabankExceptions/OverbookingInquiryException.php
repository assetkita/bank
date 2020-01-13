<?php

namespace Assetku\BankService\Exceptions\PermatabankExceptions;

use Illuminate\Http\Response;

class OverbookingInquiryException extends DisbursementException
{
    /**
     * Display error for invalid
     *
     * @param  string  $accountNumber
     * @return OverbookingInquiryException
     */
    public static function invalid(string $accountNumber)
    {
        return new static("Hasil overbooking inquiry nomor akun {$accountNumber} tidak valid.", Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display error for service unavailable
     *
     * @return OverbookingInquiryException
     */
    public static function serviceUnavailable()
    {
        return new static('Server permata bank sedang dalam perbaikan.', Response::HTTP_SERVICE_UNAVAILABLE);
    }

    /**
     * Display error for internal server error
     *
     * @return OverbookingInquiryException
     */
    public static function internalServerError()
    {
        return new static('Kesalahan dari server permata bank.', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display error for forbidden
     *
     * @param  string  $code
     * @return OverbookingInquiryException
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
     * @return OverbookingInquiryException
     */
    public static function unauthorized($code)
    {
        $message = static::translateError($code);

        return new static($message, Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Display error for unknown error
     *
     * @return OverbookingInquiryException
     */
    public static function unknownError()
    {
        return new static('Kesalahan tidak dikenali.', Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}
