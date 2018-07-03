<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\NMFC;

class NMFCTest extends TestCase
{
    /**
     * NMFC instance.
     * 
     * @var NMFC
     */
    public $NMFC;

    /**
     * Sets defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->NMFC = new NMFC();
    }

    /**
     * @test Sets defaults attribute values.
     */
    public function it_sets_defaults_attributes_values()
    {
        $this->assertEquals("00", $this->NMFC->subCode);
    }

    /**
     * @test Sets prime code attribute.
     */
    public function it_sets_prime_code_attribute()
    {
        $this->NMFC->primeCode = "AAAA";

        $this->assertEquals("AAAA", $this->NMFC->primeCode);
    }

    /**
     * @test Tries to set prime code with string an invalid string length.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of prime code must be between 4 and 6.
     */
    public function it_tries_to_set_prime_code_with_string_an_invalid_string_length()
    {
        $this->NMFC->primeCode = "AAAAAAA";
    }

    /**
     * @test Sets sub code attribute.
     */
    public function it_sets_sub_code_attribute()
    {
        $this->NMFC->subCode = "11";

        $this->assertEquals("11", $this->NMFC->subCode);
    }

    /**
     * @test Tries to set sub code with a string greater than 2.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of sub code must be less or equal to 2.
     */
    public function it_tries_to_set_sub_code_with_a_string_greater_than_2()
    {
        $this->NMFC->subCode = "000";
    }
}
