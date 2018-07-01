<?php 

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Dimensions;
use Logme\Soap\Ups\UnitOfMeasurement;

class DimensionsTest extends TestCase
{
    /**
     * @test Sets the unit of measurement container.
     */
    public function it_sets_the_unit_of_measurement_container()
    {
        $dimensions = new Dimensions();
        
        $this->assertNull($dimensions->unitOfMeasurement->code);
        $this->assertNull($dimensions->unitOfMeasurement->description);

        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->code = $unitOfMeasurement::CENTIMETERS;

        $dimensions->unitOfMeasurement = $unitOfMeasurement;

        $this->assertEquals("CM", $dimensions->unitOfMeasurement->code);
        $this->assertEquals("Centimeters", $dimensions->unitOfMeasurement->description);
    }
}
