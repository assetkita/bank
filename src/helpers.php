<?php

use Illuminate\Http\File;
use Illuminate\Support\Facades\Validator;

if (! function_exists('random_alphanumeric')) {
    /**
     * Generate a random alphanumeric string
     *
     * @param  int  $length
     * @return string
     */
    function random_alphanumeric($length = 20)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}

if (! function_exists('validate_url_base64_encoded_content')) {
    /**
     * Validate a url base64 encoded content.
     *
     * @param  string  $urlEncodedData
     * @param  array  $mimes  example ['png', 'jpg', 'jpeg']
     * @return bool
     */
    function validate_url_base64_encoded_content(string $urlEncodedData, array $mimes)
    {
        $base64DecodedData = urldecode($urlEncodedData);

        // strip out data uri scheme information (see RFC 2397)
        if (strpos($base64DecodedData, ';base64') !== false) {
            list(, $base64DecodedData) = explode(';', $base64DecodedData);

            list(, $base64DecodedData) = explode(',', $base64DecodedData);
        }

        // strict mode filters for non-base64 alphabet characters
        if (base64_decode($base64DecodedData, true) === false) {
            return false;
        }

        // decoding and then re-encoding should not change the data
        if (base64_encode(base64_decode($base64DecodedData)) !== $base64DecodedData) {
            return false;
        }

        $binaryData = base64_decode($base64DecodedData);

        // temporarily store the decoded data on the filesystem to be able to pass it to the fileAdder
        $tmpFile = tempnam(sys_get_temp_dir(), 'medialibrary');

        file_put_contents($tmpFile, $binaryData);

        // guard Against Invalid MimeType
        $mimes = array_flatten($mimes);

        // no allowedMimeTypes, then any type would be ok
        if (empty($mimes)) {
            return true;
        }

        // Check the MimeTypes
        $validation = Validator::make(
            ['file' => new File($tmpFile)],
            ['file' => 'mimes:'.implode(',', $mimes)]
        );

        return ! $validation->fails();
    }
}

if (! function_exists('validate_url_encoded_content_type')) {
    /**
     * Validate a url encoded content type.
     *
     * @param  string  $urlEncodedData
     * @param  array  $contentType  example 'image/jpeg'
     * @return bool
     */
    function validate_url_encoded_content_type(string $urlEncodedData, array $contentType)
    {
        $data = urldecode($urlEncodedData);

        return in_array($data, $contentType);
    }
}
