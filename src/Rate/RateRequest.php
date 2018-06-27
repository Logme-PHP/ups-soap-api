<?php

namespace Logme\Soap\Ups\Rate;

class RateRequest
{
    /**
     * Request container instance.
     * 
     * @var Request
     */
    public $request;

    /**
     * Pickup type container instance.
     * 
     * @var PickupType
     */
    public $pickupType;

    /**
     * Customer classification container instance.
     * Valid if ShipFrom country or territory is "US".
     * 
     * @var CustomerClassification
     */
    public $customerClassification;

    /**
     * Shipment container instance.
     * 
     * @var Shipment
     */
    public $shipment;
}
