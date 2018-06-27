<?php

namespace Logme\Soap\Ups;

class Shipper extends AbstractModel
{
    /**
     * Shipper's name or company name.
     * 
     * @var string
     */
    protected $name;

    /**
     * Shipper's UPS account number.
     * A valid account number is required to receive negotiated rates.
     * Optional otherwise. Cannot be present when requesting UserLevelDiscount.
     * 
     * @var string
     */
    protected $shipperNumber;

    /**
     * Shipper address container.
     * If the ShipFrom container is not present the this address will be used as ShipFrom.
     * If this address is used as the ShipFrom, the shipment will be rated from this origin address.
     * 
     * @var Address
     */
    protected $address;

    /**
     * Create a new Shipper instance.
     */
    public function __construct()
    {
        $this->address = new Address();
    }

    /**
     * Sets the shipper name or company name value.
     * 
     * @param string $value
     * @throws Exception
     */
    public function setName($value)
    {
        if (strlen($value) > 35) {
            throw new \Exception("The string length of shipper name must be less or equal to 35.");
        }

        $this->name = $value;
    }

    /**
     * Sets the shipper account number value.
     * 
     * @param string $value
     * @throws Exception
     */
    public function setShipperNumber($value)
    {
        if (strlen($value) > 6) {
            throw new \Exception("The string length of shipper number must be less or equal to 6.");
        }

        $this->shipperNumber = $value;
    }

    /**
     * Sets the shipper address.
     * 
     * @param Address $value
     */
    public function setAddress(Address $value)
    {
        $this->address = $value;
    }
}
