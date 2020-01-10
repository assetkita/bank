<?php

namespace Assetku\BankService\Exceptions\PermatabankExceptions;

use Illuminate\Http\Response;

class InquiryOverbookingException extends PermatabankException
{
    /**
     * Catch error with status code 200 but invalid
     *
     * @param  string  $code
     * @return InquiryOverbookingException
     */
    public static function invalid($code)
    {
        $message = static::TranslateError($code);

        return new static($message, $code);
    }

    /**
     * Display error for service unavailable
     *
     * @return InquiryOverbookingException
     */
    public static function serviceUnavailable()
    {
        return new static('Server permata bank sedang dalam perbaikan.', Response::HTTP_SERVICE_UNAVAILABLE);
    }

    /**
     * Display error for internal server error
     *
     * @return InquiryOverbookingException
     */
    public static function internalServerError()
    {
        return new static('Kesalahan dari server permata bank.', Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    /**
     * Display error for forbidden
     *
     * @param  string  $code
     * @return InquiryOverbookingException
     */
    public static function forbidden($code)
    {
        $message = static::TranslateError($code);

        return new static($message, Response::HTTP_FORBIDDEN);
    }

    /**
     * Display error for unauthorized
     *
     * @param  string  $code
     * @return InquiryOverbookingException
     */
    public static function unauthorize($code)
    {
        $message = static::TranslateError($code);

        return new static($message, Response::HTTP_UNAUTHORIZED);
    }
}
