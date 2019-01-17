<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\DryIce;
use Logme\Soap\Ups\Weight;

class DryIceTest extends TestCase
{
    /**
     * Dry Ice instance.
     *
     * @var DryIce
     */
    protected $dryIce;

    /**
     * Set up the defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->dryIce = new DryIce();
    }

    /**
     * @test Sets the defaults values.
     */
    public function it_sets_the_defaults_values()
    {
        $this->assertInstanceOf(Weight::class, $this->dryIce->dryIceWeight);
        $this->assertTrue($this->dryIce->dryIceWeight->unitOfMeasurement->useWeightMeasureAsCode);
    }

    /**
     * @test Sets the regulation set attribute.
     */
    public function it_sets_the_regulation_set_attribute()
    {
        $this->dryIce->regulationSet = 'CDR';

        $this->assertEquals('CDR', $this->dryIce->regulationSet);
    }

    /**
     * @test Tries to set regulation set with an unexpected value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set the regulation set with an unexpected value.
     */
    public function it_tries_to_set_regulation_set_with_an_unexpected_value()
    {
        $this->dryIce->regulationSet = 'ADERT';
    }

    /**
     * @test Sets the dry ice weight attribute.
     */
    public function it_sets_the_dry_ice_weight_attribute()
    {
        $dryIceWeight = new Weight();
        $dryIceWeight->unitOfMeasurement->useWeightMeasureAsCode = true;
        $dryIceWeight->unitOfMeasurement->code = $dryIceWeight->unitOfMeasurement::POUNDS_CODE;

        $this->dryIce->dryIceWeight = $dryIceWeight;

        $this->assertEquals('01', $this->dryIce->dryIceWeight->unitOfMeasurement->code);
        $this->assertEquals('Pounds', $this->dryIce->dryIceWeight->unitOfMeasurement->description);
    }
}
