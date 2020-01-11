<?php

namespace Assetku\BankService\tests;

use Assetku\BankService\Exceptions\PermatabankExceptions\StatusTransactionInquiryException;
use Assetku\BankService\Mocks\StatusTransactionInquiryMock;
use GuzzleHttp\Exception\GuzzleException;

class StatusTransactionInquiryTest extends TestCase
{
    /**
     * @throws GuzzleException
     */
    public function testSuccessStatusTransactionInquiry()
    {
        $mock = new StatusTransactionInquiryMock('ASSET59751');

        try {
            $statusTransactionInquiry = \Bank::statusTransactionInquiry($mock);

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
        $customerReferenceId = mt_rand(1111111111, 9999999999);

        $mock = new StatusTransactionInquiryMock($customerReferenceId);

        try {
            $statusTransactionInquiry = \Bank::statusTransactionInquiry($mock);

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
