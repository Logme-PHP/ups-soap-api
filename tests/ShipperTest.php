<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Shipper;
use Logme\Soap\Ups\Address;

class ShipperTest extends TestCase
{
    /**
     * Shipper instance.
     * 
     * @var Shipper
     */
    public $shipper;

    /**
     * Set up defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->shipper = new Shipper();
    }

    /**
     * @test Sets the defaults attributes values.
     */
    public function it_sets_default_attributes_values()
    {
        $this->assertInstanceOf(Address::class, $this->shipper->address);
    }

    /**
     * @test Sets shipper name or company name value.
     */
    public function it_sets_shipper_name_value()
    {
        $this->shipper->name = "Company name, Inc";

        $this->assertEquals("Company name, Inc", $this->shipper->name);
    }

    /**
     * @test Tries to set shipper or company name with a string greater than 35.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of shipper name must be less or equal to 35.
     */
    public function it_tries_to_set_shipper_or_company_name_with_a_string_greater_than_35()
    {
        $str = str_repeat("a", 36);
        $this->shipper->name = $str;
    }

    /**
     * @test Sets shipper account number value.
     */
    public function it_sets_shipper_account_number_value()
    {
        $this->shipper->shipperNumber = "123456";

        $this->assertEquals("123456", $this->shipper->shipperNumber);
    }

    /**
     * @test Tries to set shipper number with a string greater that 6.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of shipper number must be less or equal to 6.
     */
    public function it_tries_to_set_shipper_number_with_a_string_greater_than_6()
    {
        $this->shipper->shipperNumber = "1234567";
    }

    /**
     * @test Sets shipper address attribute.
     */
    public function it_sets_shipper_address_attribute()
    {
        $this->assertCount(0, $this->shipper->address->addressLine);
        $this->assertNull($this->shipper->address->stateProvinceCode);
        $this->assertNull($this->shipper->address->postalCode);
        $this->assertNull($this->shipper->address->city);
        $this->assertNull($this->shipper->address->countryCode);

        $address = new Address();
        $address->addressLine = "1st address line";
        $address->addressLine = "2nd address line";
        $address->postalCode = "123456";
        $address->city = "That City";
        $address->countryCode = "AN";

        $this->shipper->address = $address;

        $this->assertEquals("1st address line", $this->shipper->address->addressLine[0]);
        $this->assertEquals("2nd address line", $this->shipper->address->addressLine[1]);
        $this->assertEquals("123456", $this->shipper->address->postalCode);
        $this->assertEquals("That City", $this->shipper->address->city);
        $this->assertEquals("AN", $this->shipper->address->countryCode);
    }
}
