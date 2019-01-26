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

        $this->assertEquals('CM', $unitOfMeasurement->code);
        $this->assertEquals('Centimeters', $unitOfMeasurement->description);
    }

    /**
     * @test Tries to set the code for unit of measurement with an unexpected value.
     */
    public function it_tries_to_set_the_code_for_unit_of_measurement_with_an_unexpected_value()
    {
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->code = 'M';

        $this->assertEquals('M', $unitOfMeasurement->code);
        $this->assertEquals('Unknown code', $unitOfMeasurement->description);
    }

    /**
     * @test Checks if value is weight unit of measure.
     */
    public function it_checks_if_value_is_weight_unit_of_measure()
    {
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->code = $unitOfMeasurement::KILOGRAMS;

        $this->assertTrue($unitOfMeasurement->isWeightMeasure());

        $unitOfMeasurement->code = $unitOfMeasurement::CENTIMETERS;
        $unitOfMeasurement->useWeightMeasureAsCode = true;

        $this->assertFalse($unitOfMeasurement->isWeightMeasure());
    }

    /**
     * @test Checks if value is height unit of measure.
     */
    public function it_checks_if_value_is_height_unit_of_measure()
    {
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->code = $unitOfMeasurement::CENTIMETERS;

        $this->assertTrue($unitOfMeasurement->isHeightMeasure());

        $unitOfMeasurement->code = $unitOfMeasurement::KILOGRAMS;

        $this->assertFalse($unitOfMeasurement->isHeightMeasure());
    }

    /**
     * @test Sets the use weight measure as code attribute.
     */
    public function it_sets_the_use_weight_measure_as_code_attribute()
    {
        $unitOfMeasurement = new UnitOfMeasurement();
        $this->assertFalse($unitOfMeasurement->useWeightMeasureAsCode);

        $unitOfMeasurement->useWeightMeasureAsCode = true;

        $this->assertTrue($unitOfMeasurement->useWeightMeasureAsCode);
    }

    /**
     * @test Tries to set use weight measure as code without a boolean type value.
     * @expectedException Exception
     * @expectedExceptionMessage The use weight measure as code value must be a boolean type.
     */
    public function it_tries_to_set_weight_measure_as_code_without_a_boolean_type_value()
    {
        $unitOfMeasurement = new UnitOfMeasurement();
        $unitOfMeasurement->useWeightMeasureAsCode = 'string';
    }
}
