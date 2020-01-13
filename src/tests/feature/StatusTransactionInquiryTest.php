<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Exceptions\PermatabankExceptions\StatusTransactionInquiryException;
use GuzzleHttp\Exception\GuzzleException;

class StatusTransactionInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessStatusTransactionInquiry()
    {
        try {
            $statusTransactionInquiry = \Bank::statusTransactionInquiry('ASSET59751');

            $this->assertTrue(
                $statusTransactionInquiry->isSuccess()
            );
        } catch (StatusTransactionInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }

    /**
     * @throws GuzzleException
     */
    public function testNotFoundStatusTransactionInquiry()
    {
        try {
            $statusTransactionInquiry = \Bank::statusTransactionInquiry(mt_rand(1111111111, 9999999999));

            $this->assertTrue(
                $statusTransactionInquiry->getMeta()->getStatusCode() === '14'
            );
        } catch (StatusTransactionInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
