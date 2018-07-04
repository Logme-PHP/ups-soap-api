<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\HazMatChemicalRecord;

class HazMatChemicalRecordTest extends TestCase
{
    /**
     * Hazmat Chemical record container.
     * 
     * @var HazMatChemicalRecord
     */
    public $hazMatChemicalRecord;

    /**
     * Set up the defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->hazMatChemicalRecord = new HazMatChemicalRecord();
    }

    /**
     * @test Sets the chemical record identifier attribute.
     */
    public function it_sets_the_chemical_record_identifier_attribute()
    {
        $this->hazMatChemicalRecord->chemicalRecordIdentifier = "123";
        
        $this->assertEquals("123", $this->hazMatChemicalRecord->chemicalRecordIdentifier);
    }

    /**
     * @test Tries to set the chemical record identifier with a string greater than 3.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of chemical record identifier must be between 1 and 3.
     */
    public function it_tries_to_set_the_chemical_record_identifier_with_a_string_greater_than_3()
    {
        $this->hazMatChemicalRecord->chemicalRecordIdentifier = "1234";
    }

    /**
     * @test Sets the class division number attribute.
     */
    public function it_sets_the_class_division_number_attribute()
    {
        $this->hazMatChemicalRecord->classDivisionNumber = "12345";

        $this->assertEquals("12345", $this->hazMatChemicalRecord->classDivisionNumber);
    }

    /**
     * @test Tries to set the class division number with a string greater than 7.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of class division number must be between 1 and 7.
     */
    public function it_tries_to_set_class_division_number_with_a_string_greater_than_7()
    {
        $this->hazMatChemicalRecord->classDivisionNumber = "12345678";
    }

    /**
     * @test Sets the ID number attribute.
     */
    public function it_sets_the_id_number_attribute()
    {
        $this->hazMatChemicalRecord->IDNumber = "123456";

        $this->assertEquals("123456", $this->hazMatChemicalRecord->IDNumber);
    }

    /**
     * @test Tries to set ID number with a string greater than 6.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of ID number must be between 1 and 6.
     */
    public function it_tries_to_set_id_number_with_a_string_greater_than_6()
    {
        $this->hazMatChemicalRecord->IDNumber = "1234567";
    }

    /**
     * @test Sets the transportation mode attribute.
     */
    public function it_sets_the_transportation_mode_attribute()
    {
        $this->hazMatChemicalRecord->transportationMode = $this->hazMatChemicalRecord::HIGHWAY;

        $this->assertEquals("01", $this->hazMatChemicalRecord->transportationMode);
    }

    /**
     * @test Tries to set transportation mode with an unexpected value.
     * @expectedException Exception
     * @expectedExceptionMode Cannot set the transportation mode with an unexpected value.
     */
    public function it_tries_to_set_transportation_mode_with_an_unexpected_value()
    {
        $this->hazMatChemicalRecord->transportationMode = "AAA";
    }

    /**
     * @test Sets the regulation set attribute.
     */
    public function it_sets_the_regulation_set_attribute()
    {
        $this->hazMatChemicalRecord->regulationSet = "ADR";

        $this->assertEquals("ADR", $this->hazMatChemicalRecord->regulationSet);
    }

    /**
     * @test Tries to set the regulation set with an unexpected value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set the regulation set with an unexpected value.
     */
    public function it_tries_to_set_regulation_set_with_an_unexpected_value()
    {
        $this->hazMatChemicalRecord->regulationSet = "AETYYY";
    }

    /**
     * @test Sets the emergency phone attribute.
     */
    public function it_sets_the_emergency_phone_attribute()
    {
        $this->hazMatChemicalRecord->emergencyPhone = "00351 910 000 000";

        $this->assertEquals("00351 910 000 000", $this->hazMatChemicalRecord->emergencyPhone);
    }

    /**
     * @test Tries to set emergency phone with a string greater than 25.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of emergency phone must be less than or equal to 25.
     */
    public function it_tries_to_set_emergency_phone_with_a_string_greater_than_25()
    {
        $str = str_repeat("1", 26);

        $this->hazMatChemicalRecord->emergencyPhone = $str;
    }

    /**
     * @test Tries to set set emergency phone with a string with invalid chars.
     * @expectedException Exception
     * @expectedExceptionMessage The string have invalid chars for emergency phone.
     */
    public function it_tries_to_set_emergency_phone_with_a_string_with_invalid_chars()
    {
        $this->hazMatChemicalRecord->emergencyPhone = "123 a135 153a +168";
    }

    /**
     * @test Sets the emergency contact attribute.
     */
    public function it_sets_the_emergency_contact_attribute()
    {
        $this->hazMatChemicalRecord->emergencyContact = "Steven Butt";

        $this->assertEquals("Steven Butt", $this->hazMatChemicalRecord->emergencyContact);
    }

    /**
     * @test Tries to set emergency contact with a string greater than 35.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of emergency contact must be less than or equal to 35.
     */
    public function it_tries_to_set_emergency_contact_with_a_string_greater_than_35()
    {
        $str = str_repeat("a", 36);

        $this->hazMatChemicalRecord->emergencyContact = $str;
    }

    /**
     * @test Sets the reportable quantity attribute.
     */
    public function it_sets_the_reportable_quantity_attribute()
    {
        $this->hazMatChemicalRecord->reportableQuantity = "10";

        $this->assertEquals("10", $this->hazMatChemicalRecord->reportableQuantity);
    }

    /**
     * @test Tries to set the reportable quantity with a string greater than 2.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of reportable quantity must be less than or equal to 2.
     */
    public function it_tries_to_set_the_reportable_quantity_with_a_string_greater_than_2()
    {
        $this->hazMatChemicalRecord->reportableQuantity = "200";
    }

    /**
     * @test Sets the sub risk class attribute.
     */
    public function it_sets_the_sub_risk_class_attribute()
    {
        $this->hazMatChemicalRecord->subRiskClass = "This is a sub risk class";

        $this->assertEquals("This is a sub risk class", $this->hazMatChemicalRecord->subRiskClass);
    }

    /**
     * @test Tries to Set the sub risk class with a string greater than 100.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of sub risk class must be less than or equal to 100.
     */
    public function it_tries_to_set_the_sub_risk_class_with_a_string_greater_than_100()
    {
        $str = str_repeat("a", 101);

        $this->hazMatChemicalRecord->subRiskClass = $str;
    }

    /**
     * @test Sets the packaging group type attribute.
     */
    public function it_sets_the_packaging_group_type_attribute()
    {
        $this->hazMatChemicalRecord->packagingGroupType = "I";

        $this->assertEquals("I", $this->hazMatChemicalRecord->packagingGroupType);
    }

    /**
     * @test Tries to set the packaging type with an unexpected value.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of packaging group type with an unexpected value.
     */
    public function it_tries_to_set_the_packaging_group_type_with_an_unexpected_value()
    {
        $this->hazMatChemicalRecord->packagingGroupType = "IV";
    }

    /**
     * @test Sets the quantity attribute.
     */
    public function it_sets_the_quantity_attribute()
    {
        $this->hazMatChemicalRecord->quantity = "100";

        $this->assertEquals("100", $this->hazMatChemicalRecord->quantity);
    }

    /**
     * @test Tries to set quantity with a string greater than 15.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of quantity must be less than or equal to 15.
     */
    public function it_tries_to_set_quantity_with_a_string_greater_than_15()
    {
        $this->hazMatChemicalRecord->quantity = "12345678910111213";
    }

    /**
     * @test Tries to set quantity with a non numerical string.
     * @expectedException Exception
     * @expectedExceptionMessage The quantity value needs to be numeric type.
     */
    public function it_tries_to_set_quantity_with_a_non_numerical_string()
    {
        $this->hazMatChemicalRecord->quantity = "A142";
    }

    /**
     * @test Sets the UOM attribute.
     */
    public function it_sets_the_UOM_attribute()
    {
        $this->hazMatChemicalRecord->UOM = "cylinder";

        $this->assertEquals("cylinder", $this->hazMatChemicalRecord->UOM);
    }

    /**
     * @test Tries to set the UOM with a string greater than 10.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of UOM must be between 1 and 10.
     */
    public function it_tries_to_set_the_UOM_with_a_string_greater_than_10()
    {
        $this->hazMatChemicalRecord->UOM = "12345678901";
    }

    /**
     * @test Set the packaging instruction code attribute.
     */
    public function it_sets_the_packaging_instruction_code_attribute()
    {
        $this->hazMatChemicalRecord->packagingInstructionCode =  "This is the packaging instruction code.";

        $this->assertEquals("This is the packaging instruction code.", $this->hazMatChemicalRecord->packagingInstructionCode);
    }

    /**
     * @test Tries to set packaging instruction code with a string greater than 353.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of packaging instruction code must be between 1 and 353.
     */
    public function it_tries_to_set_packaging_instruction_code_with_a_string_greater_than_353()
    {
        $str = str_repeat("a", 354);

        $this->hazMatChemicalRecord->packagingInstructionCode = $str;
    }

    /**
     * @test Set the proper shipping name attribute.
     */
    public function it_sets_the_proper_shipping_name_attribute()
    {
        $this->hazMatChemicalRecord->properShippingName = "Steven Butt";

        $this->assertEquals("Steven Butt", $this->hazMatChemicalRecord->properShippingName);
    }

    /**
     * @test Tries to set proper shipping name with a string greater than 250.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of proper shipping name must be between 1 and 250.
     */
    public function it_tries_to_set_proper_shipping_name_with_a_string_greater_than_250()
    {
        $str = str_repeat("z", 251);

        $this->hazMatChemicalRecord->properShippingName = $str;
    }

    /**
     * @test Set the technical name attribute.
     */
    public function it_sets_the_technical_name_attribute()
    {
        $this->hazMatChemicalRecord->technicalName = "altronix";

        $this->assertEquals("altronix", $this->hazMatChemicalRecord->technicalName);
    }

    /**
     * @test Tries to set technical name with a string greater than 300.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of technical name must be between 1 and 300.
     */
    public function it_tries_to_set_technical_name_with_a_string_greater_than_300()
    {
        $str = str_repeat("a", 301);

        $this->hazMatChemicalRecord->technicalName = $str;
    }

    /**
     * @test Sets the additional description attribute.
     */
    public function it_sets_the_additional_description_attribute()
    {
        $this->hazMatChemicalRecord->additionalDescription = "aditional description";

        $this->assertEquals("aditional description", $this->hazMatChemicalRecord->additionalDescription);
    }

    /**
     * @test Tries to set additional description with a string a greater than 75.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of additional description must be between 1 and 75.
     */
    public function it_tries_to_set_additional_description_with_a_string_greater_than_75()
    {
        $str = str_repeat("a", 76);

        $this->hazMatChemicalRecord->additionalDescription = $str;
    }
}
