<?php 

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Dimensions;
use Logme\Soap\Ups\UnitOfMeasurement;

class DimensionsTest extends TestCase
{
    /**
     * Dimensions instance.
     * 
     * @var Dimensions
     */
    public $dimensions;

    /**
     * Set up defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->dimensions = new Dimensions();
    }
 
    /**
     * @test Sets the unit of measurement container.
     */
    public function it_sets_the_unit_of_measurement_container()
    {        
        $this->assertNull($this->dimensions->unitOfMeasurement->code);
        $this->assertNull($this->dimensions->unitOfMeasurement->description);

        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->code = $unitOfMeasurement::CENTIMETERS;

        $this->dimensions->unitOfMeasurement = $unitOfMeasurement;

        $this->assertEquals("CM", $this->dimensions->unitOfMeasurement->code);
        $this->assertEquals("Centimeters", $this->dimensions->unitOfMeasurement->description);
    }

    /**
     * @test Sets the dimensions values.
     */
    public function it_sets_the_dimensions_values()
    {
        $this->dimensions->length = "50";
        $this->dimensions->width = "40";
        $this->dimensions->height = "30";

        $this->assertEquals("50", $this->dimensions->length);
        $this->assertEquals("40", $this->dimensions->width);
        $this->assertEquals("30", $this->dimensions->height);
    }

    /**
     * @test Tris to set dimension value with string greater than 6.
     * @expectedException Exception
     * @expectedExceptionMessage The string length of length must be less or equal to 6.
     */
    public function it_tries_to_set_dimension_value_with_string_greater_than_6()
    {
        $this->dimensions->length = "1234567";
    }
}
