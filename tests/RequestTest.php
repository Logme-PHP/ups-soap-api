<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Request;
use Logme\Soap\Ups\TransactionReference;

class RequestTest extends TestCase
{
    /**
     * Request class instance.
     * 
     * @var Request.
     */
    public $request;

    /**
     * Set up defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->request = new Request();
    }

    /**
     * @test Sets the defaults attributes values.
     */
    public function it_sets_default_attributes_values()
    {
        $this->assertEquals("Rate", $this->request->requestOption);
        $this->assertNull($this->request->subVersion);
        $this->assertInstanceOf(TransactionReference::class, $this->request->transactionReference);
    }

    /**
     * @test Sets the request option value.
     */
    public function it_sets_request_option_value()
    {
        $this->request->requestOption = $this->request::SHOP;

        $this->assertEquals("Shop", $this->request->requestOption);
    }

    /**
     * @test Tries to set the request option value without an expected value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set an invalid request option value.
     */
    public function it_tries_to_set_the_request_option_value_without_an_expected_value()
    {
        $this->request->requestOption = "Bad Value";
    }

    /**
     * @test Sets the sub version option value.
     */
    public function it_sets_sub_version_option_value()
    {
        $this->request->subVersion = $this->request::SUBVERSION_1801;

        $this->assertEquals("1801", $this->request->subVersion);
    }

    /**
     * @test Tries to set the sub version value without an expected value.
     * @expectedException Exception
     * @expectedExceptionMessage The requested sub version is not supported.
     */
    public function it_tries_to_set_the_sub_version_value_without_an_expected_value()
    {
        $this->request->subVersion = "1501";
    }

    /**
     * @test Sets transaction reference value.
     */
    public function it_sets_transaction_reference_value()
    {
        $this->assertNull($this->request->transactionReference->customerContext);
        
        $transactionReference = new TransactionReference();
        $transactionReference->customerContext = "New Transaction Reference";
        $this->request->transactionReference = $transactionReference;

        $this->assertEquals("New Transaction Reference", $this->request->transactionReference->customerContext);
    }
}
