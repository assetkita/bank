<?php

namespace Assetku\BankService\Tests;

use GuzzleHttp\Exception\GuzzleException;

use Assetku\BankService\tests\TestCase;
use Symfony\Component\HttpKernel\Exception\HttpException;

class InquiryStatusRegistrationTest extends TestCase
{
//    public function testInProgressInquiryRegistrationStatus()
//    {
//        $custRefID = mt_rand(00000, 99999);
//
//        $reffCode = 'U061219011270';
//
//        try {
//            $registrationStatus = \BankService::checkRegistrationStatus($reffCode, $custRefID);
//            $applicationStatus = $registrationStatus->getApplicationStatus();
//
//            $statuses = array_map(function($product) {
//                return $product->isProductStatusInProgress();
//            }, $applicationStatus);
//
//            $this->assertTrue(! in_array(false, $statuses));
//        } catch (GuzzleException $e) {
//            throw $e;
//        }
//    }
}
