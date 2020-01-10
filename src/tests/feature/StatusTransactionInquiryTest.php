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
    public function testSuccessInquiryTransaction()
    {
        $mock = new StatusTransactionInquiryMock('ASSET59751');

        try {
            $statusTransactionInquiry = \Bank::statusTransactionInquiry($mock);

            $this->assertTrue(
                $statusTransactionInquiry->getCustomerReferenceId() === 'ASSET59751' &&
                $statusTransactionInquiry->getStatusCode() === '00'
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
    public function testInquiryStatusNotFound()
    {
        $customerReferenceId = mt_rand(1111111111, 9999999999);

        $mock = new StatusTransactionInquiryMock($customerReferenceId);

        try {
            $statusTransactionInquiry = \Bank::statusTransactionInquiry($mock);

            $this->assertTrue(
                $statusTransactionInquiry->getStatusCode() === '14' &&
                $statusTransactionInquiry->getStatusDescription() == 'INQUIRY STATUS NOT FOUND'
            );
        } catch (StatusTransactionInquiryException $e) {
            dd($e->getCode(), $e->getMessage());
        } catch (GuzzleException $e) {
            throw $e;
        }
    }
}
