<?php

namespace Logme\Soap\Ups;

use Carbon\Carbon;

class Shipment extends AbstractModel
{
    /**
     * The time that the request was made from the originating system.
     * UTC time down to milliseconds. Example: 2016-07-17T12:01:33.000.
     * Applicable only for HazMat request and subversion greater that or equal to 1701
     * 
     * @var string
     */
    protected $originRecordTransactionTimestamp;

    /**
     * Shipper container instance.
     * Information associated with the UPS account number.
     * 
     * @var Shipper
     */
    protected $shipper;

    /**
     * Ship to container instance.
     * 
     * @var Shipper
     */
    protected $shipTo;

    /**
     * Ship from container instance.
     * 
     * @var Shipper
     */
    protected $shipFrom;

    /**
     * Service container instance.
     * Only valid with RequestOption = Rate for both Small package and GFP Rating requests.
     * 
     * @var Service
     */
    protected $service;

    /**
     * Create new shipment instance.
     */
    public function __construct()
    {
        $this->shipper = new Shipper();
        $this->shipTo = new Shipper();
        $this->shipFrom = new Shipper();
    }

    /**
     * Sets the origin record transaction timestamp value in microseconds.
     * 
     * @param Carbon $value
     */
    public function setOriginRecordTransactionTimestamp(Carbon $value)
    {
        $timestamp = $value->format('Y-m-d\TH:i:s.\0\0\0');
        $this->originRecordTransactionTimestamp = $timestamp;
    }

    /**
     * Sets the shipper container.
     * 
     * @param Shipper $value
     */
    public function setShipper(Shipper $value)
    {
        $this->shipper = $value;
    }

    /**
     * Sets the ship to container.
     * 
     * @param Shipper $value
     */
    public function setShipTo(Shipper $value)
    {
        $this->shipTo = $value;
    }

    /**
     * Sets the ship from container.
     * 
     * @param Shipper $value
     */
    public function setShipFrom(Shipper $value)
    {
        $this->shipFrom = $value;
    }
}
