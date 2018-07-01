<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Weight;
use Logme\Soap\Ups\UnitOfMeasurement;

class WeightTest extends TestCase
{
    /**
     * Dimension weight instance.
     * 
     * @var Weight
     */
    public $weight;

    /**
     * Set up defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->weight = new Weight();
    }

    /**
     * @test Sets default attributes values.
     */
    public function it_sets_default_attributes_values()
    {
        $this->assertInstanceOf(UnitOfMeasurement::class, $this->weight->unitOfMeasurement);
    }

    /**
     * @test Sets the unit of measurement value.
     */
    public function it_sets_the_unit_of_measurement_value()
    {
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->code = $unitOfMeasurement::KILOGRAMS;

        $this->weight->unitOfMeasurement = $unitOfMeasurement;

        $this->assertEquals("KGS", $this->weight->unitOfMeasurement->code);
        $this->assertEquals("Kilograms", $this->weight->unitOfMeasurement->description);
    }

    /**
     * @test Tries to set unit of measurement with an expected value.
     * @expectedException Exception
     * @expectedExceptionMessage Only accepts unit of measurement related with package weight.
     */
    public function it_tris_to_set_unit_of_measurement_with_an_expected_value()
    {
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->code = $unitOfMeasurement::CENTIMETERS;
        $this->weight->unitOfMeasurement = $unitOfMeasurement;
    }

    /**
     * @test Sets dimensional weight of the package.
     */
    public function it_sets_dimensional_weight_of_the_package()
    {
        $this->weight->weight = "155.5";

        $this->assertEquals("1555", $this->weight->weight);
    }

    /**
     * @test Tries to set dimensional weight with a string greater than 6.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of weight must be less or equal to 6.
     */
    public function it_tries_to_set_dimensional_weight_with_a_string_greater_than_6()
    {
        $this->weight->weight = "111111.1";
    }
}
