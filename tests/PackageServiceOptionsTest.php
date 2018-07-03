<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\PackageServiceOptions;
use Logme\Soap\Ups\DeliveryConfirmation;
use Logme\Soap\Ups\Currency;
use Logme\Soap\Ups\CashOnDelivery;

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

        $this->assertEquals("1", $this->packageServiceOptions->deliveryConfirmation->DCISType);
    }

    /**
     * @test Sets access point COD container.
     */
    public function it_sets_access_point_COD_container()
    {
        $this->assertNull($this->packageServiceOptions->accessPointCOD->currencyCode);
        $this->assertNull($this->packageServiceOptions->accessPointCOD->monetaryValue);

        $accessPointCOD = new Currency();
        $accessPointCOD->currencyCode = "EUR";
        $accessPointCOD->monetaryValue = "200.5";

        $this->packageServiceOptions->accessPointCOD = $accessPointCOD;

        $this->assertEquals("EUR", $this->packageServiceOptions->accessPointCOD->currencyCode);
        $this->assertEquals("200.5", $this->packageServiceOptions->accessPointCOD->monetaryValue);
    }

        /**
     * @test Sets the COD container.
     */
    public function it_sets_the_COD_container()
    {
        $this->assertNull($this->packageServiceOptions->COD->CODFundsCode);
        $this->assertInstanceOf(Currency::class, $this->packageServiceOptions->COD->CODAmount);

        $CODAmount = new Currency();
        $CODAmount->currencyCode = "EUR";
        $CODAmount->monetaryValue = "200";

        $COD = new CashOnDelivery();
        $COD->CODFundsCode = "1";
        $COD->CODAmount = $CODAmount;

        $this->packageServiceOptions->COD = $COD;

        $this->assertEquals("1", $this->packageServiceOptions->COD->CODFundsCode);
        $this->assertEquals("EUR", $this->packageServiceOptions->COD->CODAmount->currencyCode);
        $this->assertEquals("200", $this->packageServiceOptions->COD->CODAmount->monetaryValue);
    }

    /**
     * @test Sets the declared value container.
     */
    public function it_sets_the_declared_value_container()
    {
        $this->assertNull($this->packageServiceOptions->declaredValue->currencyCode);
        $this->assertNull($this->packageServiceOptions->declaredValue->monetaryValue);

        $declaredValue = new Currency();
        $declaredValue->currencyCode = "EUR";
        $declaredValue->monetaryValue = "200.5";

        $this->packageServiceOptions->declaredValue = $declaredValue;

        $this->assertEquals("EUR", $this->packageServiceOptions->declaredValue->currencyCode);
        $this->assertEquals("200.5", $this->packageServiceOptions->declaredValue->monetaryValue);
    }
}
