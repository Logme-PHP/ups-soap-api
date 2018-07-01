<?php

namespace Logme\Soap\Ups;

class Weight extends AbstractModel
{
    /**
     * Unit of measurement container instance.
     * This unit of measurement represents the package weight.
     * 
     * @var UnitOfMeasurement
     */
    protected $unitOfMeasurement;

    /**
     * Dimensional weight of the package.
     * 
     * @var string
     */
    protected $weight;

    /**
     * Create a new dimensional weight instance.
     */
    public function __construct()
    {
        $this->unitOfMeasurement = new UnitOfMeasurement();
    }

    /**
     * Sets the unit of measurement.
     * Only accepts unit of measurement related with package weight.
     * 
     * Valid values:
     * KGS - Kilograms
     * LBS - Pounds 
     * 
     * @param UnitOfMeasurement $value
     * @throws Exception
     */
    public function setUnitOfMeasurement(UnitOfMeasurement $value)
    {
        if (!$value->isWeightMeasure()) {
            throw new \Exception("Only accepts unit of measurement related with package weight.");
        }

        $this->unitOfMeasurement = $value;
    }

    /**
     * Sets the dimensional weight for the package.
     * Decimal values are translate to int values (i.e. 11.5 = 115)
     * 
     * @var string
     * @throws Exception
     */
    public function setWeight($value)
    {
        $parts = explode(".", $value);
        
        $weight = count($parts) >= 2
            ? $parts[0] . mb_substr($parts[1], 0, 1)
            : $parts[0];

        if (strlen($weight) > 6) {
            throw new \Exception("The string length of weight must be less or equal to 6.");
        }

        $this->weight = strval($weight);
    }
}
