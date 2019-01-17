<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\CashOnDelivery;
use Logme\Soap\Ups\Currency;

class CashOnDeliveryTest extends TestCase
{
    /**
     * Cash on delivery instance.
     *
     * @var CashOnDelivery
     */
    public $cashOnDelivery;

    /**
     * Set up defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->cashOnDelivery = new CashOnDelivery();
    }

    /**
     * @test Sets the defaults attributes values.
     */
    public function it_sets_the_defaults_attributes_values()
    {
        $this->assertInstanceOf(Currency::class, $this->cashOnDelivery->CODAmount);
    }

    /**
     * @test Sets COD Funds code attribute.
     */
    public function it_sets_cod_funds_code_attribute()
    {
        $this->cashOnDelivery->CODFundsCode = '0';

        $this->assertEquals('0', $this->cashOnDelivery->CODFundsCode);
    }

    /**
     * @test Tries to set COD Funds code with string greater than 1.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of COD Funds code must be equal to 1.
     */
    public function it_tries_to_set_COD_Funds_code_with_string_greater_than_1()
    {
        $this->cashOnDelivery->CODFundsCode = '11';
    }

    /**
     * @test Sets the COD amount container.
     */
    public function it_sets_the_cod_amount_container()
    {
        $this->assertNull($this->cashOnDelivery->CODAmount->currencyCode);
        $this->assertNull($this->cashOnDelivery->CODAmount->monetaryValue);

        $CODAmount = new Currency();
        $CODAmount->currencyCode = 'USD';
        $CODAmount->monetaryValue = '50.00';

        $this->cashOnDelivery->CODAmount = $CODAmount;

        $this->assertEquals('USD', $this->cashOnDelivery->CODAmount->currencyCode);
        $this->assertEquals('50.00', $this->cashOnDelivery->CODAmount->monetaryValue);
    }
}
