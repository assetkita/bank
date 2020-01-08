<?php

if (! function_exists('random_alphanumeric')) {
    /**
     * Generate a random alphanumeric string
     *
     * @param  int  $length
     * @return string
     */
    function random_alphanumeric($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}
