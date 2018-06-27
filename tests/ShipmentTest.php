<?php

namespace Tests;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Logme\Soap\Ups\Shipment;
use Logme\Soap\Ups\Shipper;

class ShipmentTest extends TestCase
{
    /**
     * Shipment instance.
     * 
     * @var Shipment
     */
    public $shipment;

    /**
     * Set up defaults values for all tests.
     */
    public function setUp()
    {
        parent::setUp();
        $this->shipment = new Shipment();
    }

    /**
     * @test Sets the defaults attributes values.
     */
    public function it_sets_default_attributes_values()
    {
        $this->assertInstanceOf(Shipper::class, $this->shipment->shipper);
        $this->assertInstanceOf(Shipper::class, $this->shipment->shipTo);
        $this->assertInstanceOf(Shipper::class, $this->shipment->shipFrom);
    }

    /**
     * @test Sets the origin record transaction timestamp value.
     */
    public function it_sets_origin_record_transaction_timestamp_value()
    {
        Carbon::setTestNow(Carbon::create(2000, 1, 1, 0, 0, 0));

        $this->shipment->originRecordTransactionTimestamp = Carbon::now();

        $this->assertEquals('2000-01-01T00:00:00.000', $this->shipment->originRecordTransactionTimestamp);

        Carbon::setTestNow();
    }

    /**
     * @test Sets shipper container for shipment.
     */
    public function it_sets_shipper_container()
    {
        $this->assertNull($this->shipment->shipper->name);
        $this->assertNull($this->shipment->shipper->shipperNumber);
        $this->assertNull($this->shipment->shipper->address->city);
        $this->assertNull($this->shipment->shipper->address->postalCode);
        $this->assertNull($this->shipment->shipper->address->countryCode);

        $shipper = new Shipper();
        $shipper->name = "Company, Inc";
        $shipper->shipperNumber = "123456";
        $shipper->address->city = "Lisbon";
        $shipper->address->postalCode = "1150042";
        $shipper->address->countryCode = "PT";

        $this->shipment->shipper = $shipper;

        $this->assertEquals("Company, Inc", $this->shipment->shipper->name);
        $this->assertEquals("123456", $this->shipment->shipper->shipperNumber);
        $this->assertEquals("Lisbon", $this->shipment->shipper->address->city);
        $this->assertEquals("1150042", $this->shipment->shipper->address->postalCode);
        $this->assertEquals("PT", $this->shipment->shipper->address->countryCode);
    }

    /**
     * @test Sets ship to container for shipment.
     */
    public function it_sets_ship_to_container()
    {
        $this->assertNull($this->shipment->shipTo->name);
        $this->assertNull($this->shipment->shipTo->address->city);
        $this->assertNull($this->shipment->shipTo->address->postalCode);
        $this->assertNull($this->shipment->shipTo->address->countryCode);
        $this->assertFalse($this->shipment->shipTo->address->residentialAddressIndicator);

        $shipTo = new Shipper();
        $shipTo->name = "Company, Inc";
        $shipTo->address->city = "Lisbon";
        $shipTo->address->postalCode = "1150042";
        $shipTo->address->countryCode = "PT";
        $shipTo->address->residentialAddressIndicator = true;

        $this->shipment->shipTo = $shipTo;

        $this->assertEquals("Company, Inc", $this->shipment->shipTo->name);
        $this->assertEquals("Lisbon", $this->shipment->shipTo->address->city);
        $this->assertEquals("1150042", $this->shipment->shipTo->address->postalCode);
        $this->assertEquals("PT", $this->shipment->shipTo->address->countryCode);
        $this->assertTrue($this->shipment->shipTo->address->residentialAddressIndicator);
    }

    /**
     * @test Sets ship from container for shipment.
     */
    public function it_sets_ship_from_container()
    {
        $this->assertNull($this->shipment->shipFrom->name);
        $this->assertNull($this->shipment->shipFrom->address->city);
        $this->assertNull($this->shipment->shipFrom->address->postalCode);
        $this->assertNull($this->shipment->shipFrom->address->countryCode);

        $shipFrom = new Shipper();
        $shipFrom->name = "Company, Inc";
        $shipFrom->address->city = "Lisbon";
        $shipFrom->address->postalCode = "1150042";
        $shipFrom->address->countryCode = "PT";

        $this->shipment->shipFrom = $shipFrom;

        $this->assertEquals("Company, Inc", $this->shipment->shipFrom->name);
        $this->assertEquals("Lisbon", $this->shipment->shipFrom->address->city);
        $this->assertEquals("1150042", $this->shipment->shipFrom->address->postalCode);
        $this->assertEquals("PT", $this->shipment->shipFrom->address->countryCode);
    }
}
