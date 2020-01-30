<?php

namespace Assetku\BankService\Exceptions;

use Exception;

class PermatabankException extends Exception
{
    const STATUS_REJECTED = '01';

    const STATUS_INVALID_ACCOUNT = '02';

    const STATUS_DUPLICATE_CUST_REF_ID = '03';

    const STATUS_DAILY_LIMIT_EXCEEDS = '04';

    const STATUS_DISALLOWED_TRANSACTION = '05';

    const STATUS_INVALID_TRX_TYPE = '06';

    const STATUS_GENERIC_EXCEPTION = '12';

    const STATUS_INVALID_AMOUNT = '13';

    const STATUS_ACCOUNT_NOT_FOUND = '14';

    const STATUS_INQUIRY_STATUS_NOT_FOUND = '14';

    const STATUS_DISALLOWED_TRANSACTION_TWO = '15';

    const STATUS_AMOUNT_TRANSACTION_IS_UNDER_RTGS_LIMIT_AMOUNT = '17';

    const STATUS_INVALID_TO_ACCOUNT = '19';

    const STATUS_INVALID_FORMAT = '30';

    const STATUS_INVALID_BANK_CODE = '31';

    const STATUS_INSUFFICIENT_FUND = '51';

    const STATUS_MINIMAL_TRANSACTION_LIMIT_EXCEEDED = '51';

    const STATUS_EXCEEDS_WITHDRAWAL_AMOUNT_LIMIT = '61';

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
     * Translate the error from permatabank
     *
     * @param  string  $code
     * @return string
     */
    public static function translate(string $code)
    {
        switch ($code) {
            case static::STATUS_REJECTED:
                $message = 'Ditolak.';
                break;

            case static::STATUS_INVALID_ACCOUNT:
                $message = 'Akun tidak valid.';
                break;

            case static::STATUS_DUPLICATE_CUST_REF_ID:
                $message = 'ID referensi pelanggan rangkap.';
                break;

            case static::STATUS_DAILY_LIMIT_EXCEEDS:
                $message = 'Melebihi batas harian.';
                break;

            case static::STATUS_DISALLOWED_TRANSACTION:
            case static::STATUS_DISALLOWED_TRANSACTION_TWO:
                $message = 'Transaksi tidak diperbolehkan.';
                break;

            case static::STATUS_INVALID_TRX_TYPE:
                $message = 'Jenis transfer tidak valid.';
                break;

            case static::STATUS_GENERIC_EXCEPTION:
                $message = 'Pengecualian umum.';
                break;

            case static::STATUS_INVALID_AMOUNT:
                $message = 'Jumlah transfer tidak valid.';
                break;

            case static::STATUS_ACCOUNT_NOT_FOUND:
            case static::STATUS_INQUIRY_STATUS_NOT_FOUND:
                $message = 'Akun tidak ditemukan. | Status pemeriksaan tidak ditemukan.';
                break;

            case static::STATUS_AMOUNT_TRANSACTION_IS_UNDER_RTGS_LIMIT_AMOUNT:
                $message = 'Jumlah Transaksi Di Bawah Jumlah Batas RTGS.';
                break;

            case static::STATUS_INVALID_TO_ACCOUNT:
                $message = 'Akun tujuan tidak valid.';
                break;

            case static::STATUS_INVALID_FORMAT:
                $message = 'Format tidak valid.';
                break;

            case static::STATUS_INVALID_BANK_CODE:
                $message = 'Kode bank tidak valid.';
                break;

            case static::STATUS_INSUFFICIENT_FUND:
            case static::STATUS_MINIMAL_TRANSACTION_LIMIT_EXCEEDED:
                $message = 'Dana tidak cukup. | Melebihi batas transaksi minimal.';
                break;

            case static::STATUS_EXCEEDS_WITHDRAWAL_AMOUNT_LIMIT:
                $message = 'Melebihi batas jumlah penarikan.';
                break;

            case static::STATUS_RESTRICTED_CARD:
                $message = 'Kartu dibatasi.';
                break;

            case static::STATUS_SECURITY_VIOLATION:
                $message = 'Pelanggaran keamanan.';
                break;

            case static::STATUS_GENERIC_ERROR:
                $message = 'Kesalahan umum.';
                break;

            case static::STATUS_TIMEOUT_BILL_PAYMENT:
                $message = 'Kehabisan waktu pembayaran tagihan.';
                break;

            case static::STATUS_BILL_ALREADY_PAID:
                $message = 'Tagihan telah dibayar.';
                break;

            case static::STATUS_INVALID_BENEFICIARY_OR_CURRENCY:
                $message = 'Penerima atau mata uang tidak valid.';
                break;

            case static::STATUS_TRANSPORT_ERROR_TO_BACKEND:
                $message = 'Kesalahan transportasi ke backend.';
                break;

            case static::STATUS_TRANSPORT_ERROR_TO_3RD_PARTY:
                $message = 'Kesalahan transportasi ke pihak ketiga.';
                break;

            case static::STATUS_TIMEOUT:
                $message = 'Kehabisan waktu.';
                break;

            case static::STATUS_PRIVATE_KEY_IS_NOT_FOUND:
                $message = 'Kunci pribadi tidak ditemukan.';
                break;

            case static::STATUS_UNAUTHORIZED:
                $message = 'Tidak berwenang.';
                break;

            case static::STATUS_SIGNATURE_NOT_VALID:
                $message = 'Tanda tangan tidak valid.';
                break;

            default:
                $message = 'Kesalahan tidak dikenali.';
                break;
        }

        return $message;
    }
}
