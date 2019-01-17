<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Insurance;
use Logme\Soap\Ups\Currency;

class InsuranceTest extends TestCase
{
    /**
     * Insurance instance.
     *
     * @var Insurance
     */
    public $insurance;

    /**
     * Set up defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->insurance = new Insurance();
    }

    /**
     * @test Sets the defaults_attributes values.
     */
    public function it_sets_the_defaults_attributes_values()
    {
        $this->assertInstanceOf(Currency::class, $this->insurance->basicFlexibleParcelIndicator);
        $this->assertInstanceOf(Currency::class, $this->insurance->extendedFlexibleParcelIndicator);
        $this->assertInstanceOf(Currency::class, $this->insurance->timeInTransitFlexibleParcelIndicator);
    }

    /**
     * @test Sets the basic flexible parcel indicator value container.
     */
    public function it_sets_the_basic_flexible_parcel_indicator_value_container()
    {
        $this->assertNull($this->insurance->basicFlexibleParcelIndicator->currencyCode);
        $this->assertNull($this->insurance->basicFlexibleParcelIndicator->monetaryValue);

        $basicFlexibleParcelIndicator = new Currency();
        $basicFlexibleParcelIndicator->currencyCode = 'EUR';
        $basicFlexibleParcelIndicator->monetaryValue = '200.5';

        $this->insurance->basicFlexibleParcelIndicator = $basicFlexibleParcelIndicator;

        $this->assertEquals('EUR', $this->insurance->basicFlexibleParcelIndicator->currencyCode);
        $this->assertEquals('200.5', $this->insurance->basicFlexibleParcelIndicator->monetaryValue);
    }

    /**
     * @test Sets the extended flexible parcel indicator value container.
     */
    public function it_sets_the_extended_flexible_parcel_indicator_value_container()
    {
        $this->assertNull($this->insurance->extendedFlexibleParcelIndicator->currencyCode);
        $this->assertNull($this->insurance->extendedFlexibleParcelIndicator->monetaryValue);

        $extendedFlexibleParcelIndicator = new Currency();
        $extendedFlexibleParcelIndicator->currencyCode = 'EUR';
        $extendedFlexibleParcelIndicator->monetaryValue = '200';

        $this->insurance->extendedFlexibleParcelIndicator = $extendedFlexibleParcelIndicator;

        $this->assertEquals('EUR', $this->insurance->extendedFlexibleParcelIndicator->currencyCode);
        $this->assertEquals('200', $this->insurance->extendedFlexibleParcelIndicator->monetaryValue);
    }

    /**
     * @test Sets the time in transit flexible parcel indicator value container.
     */
    public function it_sets_the_time_in_transit_flexible_parcel_indicator_value_container()
    {
        $this->assertNull($this->insurance->timeInTransitFlexibleParcelIndicator->currencyCode);
        $this->assertNull($this->insurance->timeInTransitFlexibleParcelIndicator->monetaryValue);

        $timeInTransitFlexibleParcelIndicator = new Currency();
        $timeInTransitFlexibleParcelIndicator->currencyCode = 'EUR';
        $timeInTransitFlexibleParcelIndicator->monetaryValue = '200';

        $this->insurance->timeInTransitFlexibleParcelIndicator = $timeInTransitFlexibleParcelIndicator;

        $this->assertEquals('EUR', $this->insurance->timeInTransitFlexibleParcelIndicator->currencyCode);
        $this->assertEquals('200', $this->insurance->timeInTransitFlexibleParcelIndicator->monetaryValue);
    }
}
