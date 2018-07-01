<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\UnitOfMeasurement;

class UnitOfMeasurementTest extends TestCase
{
    /**
     * @test Sets the code that representing the unit of measurement.
     */
    public function it_sets_the_code_that_representing_the_unit_of_measurement()
    {
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->code = $unitOfMeasurement::CENTIMETERS;

        $this->assertEquals("CM", $unitOfMeasurement->code);
        $this->assertEquals("Centimeters", $unitOfMeasurement->description);
    }

    /**
     * @test Tries to set the code for unit of measurement with an unexpected value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set an invalid code value.
     */
    public function it_tries_to_set_the_code_for_unit_of_measurement_with_an_unexpected_value()
    {
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->code = "M";
    }
}
