<?php

namespace Logme\Soap\Ups\Track;

use Logme\Soap\Ups\AbstractModel;
use Logme\Soap\Ups\Address;

class ShipmentAddress extends AbstractModel
{
    /**
     * Type container for address.
     *
     * @var Type
     */
    protected $type;

    /**
     * Address detail container.
     *
     * @var Address
     */
    protected $address;

    /**
     * Create a new shipment address instance.
     */
    public function __construct()
    {
        $this->type = new Type();
        $this->address = new Address();
    }

    /**
     * Sets the type container.
     *
     * @var Type
     */
    public function setType(Type $value)
    {
        $this->type = $value;
    }

    /**
     * Sets the address container.
     *
     * @var Address
     */
    public function setAddress(Address $value)
    {
        $this->address = $value;
    }
}
