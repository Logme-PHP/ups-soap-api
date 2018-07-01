<?php

namespace Logme\Soap\Ups;

class Dimensions extends AbstractModel
{
    /**
     * Unit Of Measurement container instance.
     * 
     * @var UnitOfMeasurement
     */
    protected $unitOfMeasurement;

    /**
     * Create new dimensions instance.
     */
    public function __construct()
    {
        $this->unitOfMeasurement = new UnitOfMeasurement();
    }

    /**
     * Sets the unit of measurement for package dimensions.
     *
     * @param UnitOfMeasurement $value
     */
    public function setUnitOfMeasurement(UnitOfMeasurement $value)
    {
        $this->unitOfMeasurement = $value;
    }
}
