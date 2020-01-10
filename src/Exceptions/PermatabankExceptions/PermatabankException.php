<?php

namespace Assetku\BankService\Exceptions\PermatabankExceptions;

use Exception;
use Assetku\BankService\Contracts\BankExceptionContract;

class PermatabankException extends Exception implements BankExceptionContract
{
    const STATUS_REJECTED = '01';

    const STATUS_IN_PROGRESS = '02';

    const STATUS_DUPLICATE_CUST_REF_ID = '03';

    const STATUS_DAILY_LIMIT_EXCEEDS = '04';

    const STATUS_DISALLOWED_TRANSACTION = '05';
    
    const STATUS_INVALID_TRX_TYPE = '06';
    
    const STATUS_GENERIC_EXCEPTION = '12';

    const STATUS_INVALID_AMOUNT = '13';
    
    const STATUS_ACCOUNT_NOT_FOUND = '14';

    const STATUS_DISALLOWED_TRANSACTION_TWO = '15';

    const STATUS_AMOUNT_TRANSACTION_IS_UNDER_RTGS_LIMIT_AMOUNT = '17';
    
    const STATUS_INVALID_TO_ACCOUNT = '19';
    
    const STATUS_INVALID_FORMAT = '30';
    
    const STATUS_INVALID_BANK_CODE = '31';
    
    const STATUS_INSUFFICIENT_FUND = '51';
    
    const STATUS_EXCEEDS_WITHDRAWL_AMOUNT_LIMIT = '61';
    
    const STATUS_RESTRICTED_CARD = '62';
    
    const STATUS_SECURITY_VIOLATION = '63';
    
    const STATUS_GENERIC_ERROR = '66';
    
    const STATUS_TIMEOUT_BILL_PAYMENT = '68';
    
    const STATUS_BILL_ALREADY_PAID = '88';
    
    const STATUS_INVALID_BENEFICIARY_OR_CURRENCY = '90';
    
    const STATUS_TRANSPORT_ERROR_TO_BACKEND = '91';

    const STATUS_TRANSPORT_ERROR_TO_3RD_PARTY = '95';
    
    const STATUS_TIMEOUT = '96';
    
    const STATUS_PRIVATE_KEY_IS_NOT_FOUND = '400';
    
    const STATUS_UNAUTHORIZED = '401';
    
    const STATUS_SIGNATURE_NOT_VALID = '403';

    /**
     * get translated error from Bank Provider
     * 
     * @param mixed $code
     * @return string
     */
    public static function TranslateError($code)
    {
        switch ($code) {
            case static::STATUS_REJECTED:
                $message = 'Ditolak.';
                break;
            
            case static::STATUS_IN_PROGRESS:
                $message = 'Dalam Progress Transaction. menunggu status rekonsiliasi.';
                break;
            
            case static::STATUS_DUPLICATE_CUST_REF_ID:
                $message = 'CustReffId tidak boleh sama.';
                break;
            
            case static::STATUS_DAILY_LIMIT_EXCEEDS:
                $message = 'Batas Harian Melebihi.';
                break;

            case static::STATUS_DISALLOWED_TRANSACTION:
                $message = 'Transaksi tidak diperbolehkan.';
                break;
            
            case static::STATUS_INVALID_TRX_TYPE:
                $message = 'Jenis Transfer tidak valid.';
                break;
            
            case static::STATUS_GENERIC_EXCEPTION:
                $message = 'Generic Exception.';
                break;
            
            case static::STATUS_INVALID_AMOUNT:
                $message = 'Jumlah Transfer tidak valid.';
                break;
            
            case static::STATUS_ACCOUNT_NOT_FOUND:
                $message = 'akun tidak ditemukan.';
                break;
            
            case static::STATUS_DISALLOWED_TRANSACTION_TWO:
                $message = 'Transaksi tidak diperbolehkan.';
                break;
            
            case static::STATUS_AMOUNT_TRANSACTION_IS_UNDER_RTGS_LIMIT_AMOUNT:
                $message = 'Jumlah Transaksi Di Bawah Jumlah Batas RTGS.';
                break;
            
            case static::STATUS_INVALID_TO_ACCOUNT:
                $message = 'Akun tidak valid.';
                break;
            
            case static::STATUS_INVALID_FORMAT:
                $message = 'Format tidak valid.';
                break;
            
            case static::STATUS_INVALID_BANK_CODE:
                $message = 'Kode bank tidak valid.';
                break;
            
            case static::STATUS_INSUFFICIENT_FUND:
                $message = 'Dana tidak cukup.';
                break;

            case static::STATUS_EXCEEDS_WITHDRAWL_AMOUNT_LIMIT:
                $message = 'Jumlah penarikan dana terbatas.';
                break;
            
            case static::STATUS_RESTRICTED_CARD: 
                $message = 'kartu dilarang.';
                break;

            case static::STATUS_SECURITY_VIOLATION:
                $message = 'Pelanggaran keamanan.';
                break;

            case static::STATUS_GENERIC_ERROR:
                $message = 'Generic error.';
                break;

            case static::STATUS_TIMEOUT_BILL_PAYMENT:
                $message = 'Billing timeout.';
                break;

            case static::STATUS_BILL_ALREADY_PAID:
                $message = 'Billing telah dibayar.';
                break;

            case static::STATUS_INVALID_BENEFICIARY_OR_CURRENCY:
                $message = 'Penerimaan atau mata uang tidak valid.';
                break;

            case static::STATUS_TRANSPORT_ERROR_TO_BACKEND:
                $message = 'transportasi ke backend error.';
                break;

            case static::STATUS_TRANSPORT_ERROR_TO_3RD_PARTY:
                $message = 'transportasi ke 3rd party error.';
                break;

            case static::STATUS_TIMEOUT:
                $message = 'Error timeout.';
                break;

            case static::STATUS_PRIVATE_KEY_IS_NOT_FOUND:
                $message = 'Private key salah atau tidak tersedia.';
                break;

            case static::STATUS_UNAUTHORIZED:
                $message = 'Tidak memiliki hak akses.';
                break;

            case static::STATUS_SIGNATURE_NOT_VALID:
                $message = 'Signature code tidak cocok.';
                break;
            
            default:
                $message = 'Kesalahan tidak dikenali.';
                break;
        }

        return $message;
    }
}
