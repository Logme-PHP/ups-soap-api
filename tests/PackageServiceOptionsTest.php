<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\PackageServiceOptions;
use Logme\Soap\Ups\DeliveryConfirmation;
use Logme\Soap\Ups\Currency;
use Logme\Soap\Ups\CashOnDelivery;
use Logme\Soap\Ups\Insurance;

class PackageServiceOptionsTest extends TestCase
{
    /**
     * Package service options instance.
     *
     * @var PackageServiceOptions
     */
    public $packageServiceOptions;

    /**
     * Set up defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->packageServiceOptions = new PackageServiceOptions();
    }

    /**
     * @test Sets defaults attributes values.
     */
    public function it_sets_defaults_attributes_values()
    {
        $this->assertInstanceOf(DeliveryConfirmation::class, $this->packageServiceOptions->deliveryConfirmation);
        $this->assertInstanceOf(Currency::class, $this->packageServiceOptions->accessPointCOD);
        $this->assertInstanceOf(CashOnDelivery::class, $this->packageServiceOptions->COD);
        $this->assertInstanceOf(Currency::class, $this->packageServiceOptions->shipperDeclaredValue);
        $this->assertFalse($this->packageServiceOptions->proactiveIndicator);
        $this->assertFalse($this->packageServiceOptions->refrigerationIndicator);
        $this->assertInstanceOf(Insurance::class, $this->packageServiceOptions->insurance);
    }

    /**
     * @test Sets delivery confirmation container.
     */
    public function it_sets_delivery_confirmation_container()
    {
        $this->assertNull($this->packageServiceOptions->deliveryConfirmation->DCISType);

        $deliveryConfirmation = new DeliveryConfirmation();
        $deliveryConfirmation->DCISType = $deliveryConfirmation::DELIVERY_CONFIRMATION;

        $this->packageServiceOptions->deliveryConfirmation = $deliveryConfirmation;

        $this->assertEquals('1', $this->packageServiceOptions->deliveryConfirmation->DCISType);
    }

    /**
     * @test Sets access point COD container.
     */
    public function it_sets_access_point_COD_container()
    {
        $this->assertNull($this->packageServiceOptions->accessPointCOD->currencyCode);
        $this->assertNull($this->packageServiceOptions->accessPointCOD->monetaryValue);

        $accessPointCOD = new Currency();
        $accessPointCOD->currencyCode = 'EUR';
        $accessPointCOD->monetaryValue = '200.5';

        $this->packageServiceOptions->accessPointCOD = $accessPointCOD;

        $this->assertEquals('EUR', $this->packageServiceOptions->accessPointCOD->currencyCode);
        $this->assertEquals('200.5', $this->packageServiceOptions->accessPointCOD->monetaryValue);
    }

    /**
     * @test Sets the COD container.
     */
    public function it_sets_the_COD_container()
    {
        $this->assertNull($this->packageServiceOptions->COD->CODFundsCode);
        $this->assertInstanceOf(Currency::class, $this->packageServiceOptions->COD->CODAmount);

        $CODAmount = new Currency();
        $CODAmount->currencyCode = 'EUR';
        $CODAmount->monetaryValue = '200';

        $COD = new CashOnDelivery();
        $COD->CODFundsCode = '1';
        $COD->CODAmount = $CODAmount;

        $this->packageServiceOptions->COD = $COD;

        $this->assertEquals('1', $this->packageServiceOptions->COD->CODFundsCode);
        $this->assertEquals('EUR', $this->packageServiceOptions->COD->CODAmount->currencyCode);
        $this->assertEquals('200', $this->packageServiceOptions->COD->CODAmount->monetaryValue);
    }

    /**
     * @test Sets the declared value container.
     */
    public function it_sets_the_declared_value_container()
    {
        $this->assertNull($this->packageServiceOptions->declaredValue->currencyCode);
        $this->assertNull($this->packageServiceOptions->declaredValue->monetaryValue);

        $declaredValue = new Currency();
        $declaredValue->currencyCode = 'EUR';
        $declaredValue->monetaryValue = '200.5';

        $this->packageServiceOptions->declaredValue = $declaredValue;

        $this->assertEquals('EUR', $this->packageServiceOptions->declaredValue->currencyCode);
        $this->assertEquals('200.5', $this->packageServiceOptions->declaredValue->monetaryValue);
    }

    /**
     * @test Sets the shipper declared value container.
     */
    public function it_sets_the_shipper_declared_value_container()
    {
        $this->assertNull($this->packageServiceOptions->shipperDeclaredValue->currencyCode);
        $this->assertNull($this->packageServiceOptions->shipperDeclaredValue->monetaryValue);

        $declaredValue = new Currency();
        $declaredValue->currencyCode = 'EUR';
        $declaredValue->monetaryValue = '200.5';

        $this->packageServiceOptions->shipperDeclaredValue = $declaredValue;

        $this->assertEquals('EUR', $this->packageServiceOptions->shipperDeclaredValue->currencyCode);
        $this->assertEquals('200.5', $this->packageServiceOptions->shipperDeclaredValue->monetaryValue);
    }

    /**
     * @test Sets the proactive indicator attribute.
     */
    public function it_sets_the_proactive_indicator_attribute()
    {
        $this->packageServiceOptions->proactiveIndicator = true;

        $this->assertTrue($this->packageServiceOptions->proactiveIndicator);
    }

    /**
     * @test Tries to set the proactive indicator without a boolean type value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set the proactive indicator without a boolean type value.
     */
    public function it_tries_to_set_the_proactive_indicator_without_a_boolean_type_value()
    {
        $this->packageServiceOptions->proactiveIndicator = 'string';
    }

    /**
     * @test Sets the refrigeration indicator attribute.
     */
    public function it_sets_the_refrigeration_indicator_attribute()
    {
        $this->packageServiceOptions->refrigerationIndicator = true;

        $this->assertTrue($this->packageServiceOptions->refrigerationIndicator);
    }

    /**
     * @test Tries to set the refrigeration indicator without a boolean type value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set the refrigeration indicator without a boolean type value.
     */
    public function it_tries_to_set_the_refrigeration_indicator_without_a_boolean_type_value()
    {
        $this->packageServiceOptions->refrigerationIndicator = 'string';
    }

    /**
     * @test Sets the insurance attribute container.
     */
    public function it_sets_insurance_attribute_container()
    {
        $this->assertInstanceOf(Currency::class, $this->packageServiceOptions->insurance->basicFlexibleParcelIndicator);
        $this->assertNull($this->packageServiceOptions->insurance->basicFlexibleParcelIndicator->currencyCode);
        $this->assertNull($this->packageServiceOptions->insurance->basicFlexibleParcelIndicator->monetaryValue);
        $this->assertInstanceOf(Currency::class, $this->packageServiceOptions->insurance->extendedFlexibleParcelIndicator);
        $this->assertNull($this->packageServiceOptions->insurance->extendedFlexibleParcelIndicator->currencyCode);
        $this->assertNull($this->packageServiceOptions->insurance->extendedFlexibleParcelIndicator->monetaryValue);
        $this->assertInstanceOf(Currency::class, $this->packageServiceOptions->insurance->timeInTransitFlexibleParcelIndicator);
        $this->assertNull($this->packageServiceOptions->insurance->timeInTransitFlexibleParcelIndicator->currencyCode);
        $this->assertNull($this->packageServiceOptions->insurance->timeInTransitFlexibleParcelIndicator->monetaryValue);

        $basic = new Currency();
        $basic->currencyCode = 'USD';
        $basic->monetaryValue = '50';

        $extended = new Currency();
        $extended->currencyCode = 'EUR';
        $extended->monetaryValue = '60';

        $timeInTransit = new Currency();
        $timeInTransit->currencyCode = 'USD';
        $timeInTransit->monetaryValue = '40';

        $insurance = new Insurance();
        $insurance->basicFlexibleParcelIndicator = $basic;
        $insurance->extendedFlexibleParcelIndicator = $extended;
        $insurance->timeInTransitFlexibleParcelIndicator = $timeInTransit;

        $this->packageServiceOptions->insurance = $insurance;

        $this->assertEquals('USD', $this->packageServiceOptions->insurance->basicFlexibleParcelIndicator->currencyCode);
        $this->assertEquals('50', $this->packageServiceOptions->insurance->basicFlexibleParcelIndicator->monetaryValue);
        $this->assertEquals('EUR', $this->packageServiceOptions->insurance->extendedFlexibleParcelIndicator->currencyCode);
        $this->assertEquals('60', $this->packageServiceOptions->insurance->extendedFlexibleParcelIndicator->monetaryValue);
        $this->assertEquals('USD', $this->packageServiceOptions->insurance->timeInTransitFlexibleParcelIndicator->currencyCode);
        $this->assertEquals('40', $this->packageServiceOptions->insurance->timeInTransitFlexibleParcelIndicator->monetaryValue);
    }

    /**
     * @test Sets the verbal confirmation indicator attribute.
     */
    public function it_sets_the_verbal_confirmation_indicator_attribute()
    {
        $this->packageServiceOptions->verbalConfirmationIndicator = true;

        $this->assertTrue($this->packageServiceOptions->verbalConfirmationIndicator);
    }

    /**
     * @test Tries to set the verbal confirmation  indicator without a boolean type value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set the verbal confirmation indicator without a boolean type value.
     */
    public function it_tries_to_set_the_verbal_confirmation_indicator_without_a_boolean_type_value()
    {
        $this->packageServiceOptions->verbalConfirmationIndicator = 'string';
    }

    /**
     * @test Sets the UPS premium care indicator attribute.
     */
    public function it_sets_the_UPS_premium_care_indicator_attribute()
    {
        $this->packageServiceOptions->UPSPremiumCareIndicator = true;

        $this->assertTrue($this->packageServiceOptions->UPSPremiumCareIndicator);
    }

    /**
     * @test Tries to set the UPS Premium care indicator a boolean type value.
     * @expectedException Exception
     * @expectedExceptionMessage Cannot set the UPS Premium care indicator a boolean type value.
     */
    public function it_tries_to_set_the_UPS_premium_care_indicator_without_a_boolean_type_value()
    {
        $this->packageServiceOptions->UPSPremiumCareIndicator = 'string';
    }
}
