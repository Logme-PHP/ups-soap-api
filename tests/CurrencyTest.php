<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Currency;

class CurrencyTest extends TestCase
{
    /**
     * Access Point COD instance.
     * 
     * @var Currency
     */
    public $accessPointCOD;

    /**
     * Sets defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->accessPointCOD = new Currency();
    }

    /**
     * @test Sets currency code attribute value.
     */
    public function it_sets_currency_code_attribute_value()
    {
        $this->accessPointCOD->currencyCode = "EUR";

        $this->assertEquals("EUR", $this->accessPointCOD->currencyCode);
    }

    /**
     * @test Tries to set currency code with a string greater than 3.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of currency code must be less or equal to 3.
     */
    public function it_tries_to_set_currency_code_with_a_string_greater_than_3()
    {
        $this->accessPointCOD->currencyCode = "EURO";
    }

    /**
     * @test Sets monetary value attribute.
     */
    public function it_sets_monetary_value_attribute()
    {
        $this->accessPointCOD->monetaryValue = "2000.50";

        $this->assertEquals("2000.50", $this->accessPointCOD->monetaryValue);
    }

    /**
     * @test Tries to set monetary value with a string greater than 8.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of monetary value must be less or equal to 8.
     */
    public function it_tries_to_set_monetary_value_with_a_string_greater_than_8()
    {
        $this->accessPointCOD->monetaryValue = "200000000000";
    }
}
