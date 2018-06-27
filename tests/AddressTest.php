<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Address;

class AddressTest extends TestCase
{
    /**
     * Address container instance.
     * 
     * @var Address
     */
    public $address;

    /**
     * Set up defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->address = new Address();
    }

    /**
     * @test Sets address line value
     */
    public function it_sets_address_line_value()
    {
        $this->address->addressLine = "1st address line";

        $this->assertCount(1, $this->address->addressLine);
        $this->assertContains("1st address line", $this->address->addressLine);

        $this->address->addressLine = "2nd address line";

        $this->assertCount(2, $this->address->addressLine);
        $this->assertContains("1st address line", $this->address->addressLine);
        $this->assertContains("2nd address line", $this->address->addressLine);

        $this->address->addressLine = "3rd address line";

        $this->assertCount(3, $this->address->addressLine);
        $this->assertContains("1st address line", $this->address->addressLine);
        $this->assertContains("2nd address line", $this->address->addressLine);
        $this->assertContains("3rd address line", $this->address->addressLine);
    }

    /**
     * @test Tries to set a new address line but the address line array already have 3 elements.
     * @expectedException Exception
     * @expectedExceptionMessage The maximum size of address line array are 3 elements.
     */
    public function it_tries_to_set_a_new_address_line_but_the_address_line_array_already_have_3_elements()
    {
        $this->address->addressLine = [
            "1st address line",
            "2nd address line",
            "3rd address line"
        ];
        $this->address->addressLine = "4th address line";
    }

    /**
     * @test Tries to set address line with string length greater that 35.
     * @expectedException Exception
     * @expectedExceptionMesssage The string length of address line must be less or equal to 35
     */
    public function it_tries_to_set_address_line_with_string_length_greater_that_35()
    {
        $str = str_repeat("a", 36);
        $this->address->addressLine = $str;
    }

    /**
     * @test Tries to add new element to address line but the list reach the maximum size of 3 elements.
     * @expectedException Exception
     * @expectedExceptionMessage The maximum size of address line array are 3 elements.
     */
    public function it_tries_to_add_new_element_to_address_line_but_the_list_reach_the_maximum_size_of_3_elements()
    {
        $this->address->addressLine = [
            "1st address line",
            "2nd address line",
        ];
        $this->address->addressLine = [
            "3rd address line",
            "4th address line"
        ];
    }

    /**
     * @test Clean the address line list.
     */
    public function it_cleans_the_address_line_list()
    {
        $this->address->addressLine = [
            "1st address line",
            "2nd address line",
            "3rd address line"
        ];
        $this->assertCount(3, $this->address->addressLine);

        $this->address->addressLine = [];

        $this->assertCount(0, $this->address->addressLine);
    }

    /**
     * @test Sets the city address of the address.
     */
    public function it_sets_city_of_the_address()
    {
        $this->address->city = "Lisbon";
        
        $this->assertEquals("Lisbon", $this->address->city);
    }

    /**
     * @test Tries to set city with a string length greater than 30.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of city must be less or equal to 30.
     */
    public function it_tries_to_set_city_with_a_string_length_greater_than_30()
    {
        $str = str_repeat("a", 31);
        $this->address->city = $str;
    }

    /**
     * @test Sets the state province code of the address.
     */
    public function it_sets_the_state_province_code_of_the_address()
    {
        $this->address->stateProvinceCode = "AA";

        $this->assertEquals("AA", $this->address->stateProvinceCode);
    }

    /**
     * @test Tries to set state province code with a string length greater that 2.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of state province code must be less or equal to 2.
     */
    public function it_tries_to_set_state_province_code_with_a_string_length_greater_than_2()
    {
        $this->address->stateProvinceCode = "AAA";
    }

    /**
     * @test Sets the postal code of the address.
     */
    public function it_sets_the_postal_code_of_the_address()
    {
        $this->address->postalCode = "2400766";
        
        $this->assertEquals("2400766", $this->address->postalCode);
    }

    /**
     * @test Tries to set postal code with a string length greater than 9.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of postal code must be less or equal to 9.
     */
    public function it_tries_to_set_postal_code_with_a_string_length_greater_than_9()
    {
        $this->address->postalCode = "0123456789";
    }

    /**
     * @test Sets the country code of the address.
     */
    public function it_sets_the_country_code_of_the_address()
    {
        $this->address->countryCode = "AN";

        $this->assertEquals("AN", $this->address->countryCode);
    }

    /**
     * @test Tries to set country code with a string length greater than 2.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of country code must be equal to 2.
     */
    public function it_tries_to_set_country_code_with_a_string_length_greater_than_2()
    {
        $this->address->countryCode = "AQT";
    }

    /**
     * @test Sets the residential address indicator.
     */
    public function it_sets_the_residential_address_indicator()
    {
        $this->assertFalse($this->address->residentialAddressIndicator);

        $this->address->residentialAddressIndicator = true;

        $this->assertTrue($this->address->residentialAddressIndicator);
    }

    /**
     * @test Tries to set residential address indicator without a boolean type value.
     * @expectedException Exception
     * @expectedExceptionMessage The residential address indicator expects a boolean value.
     */
    public function it_tries_to_set_residential_address_indicator_without_a_boolean_type_value()
    {
        $this->address->residentialAddressIndicator = "is false";
    }
}
