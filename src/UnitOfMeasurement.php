<?php

namespace Logme\Soap\Ups;

class UnitOfMeasurement extends AbstractType
{
    const INCHES = "IN";
    const CENTIMETERS = "CM";
    const POUNDS = "LBS";
    const KILOGRAMS = "KGS";

    /**
     * List with descriptions for unit of measurement.
     * 
     * @var array
     */
    protected $descriptions = [
        self::INCHES => "Inches",
        self::CENTIMETERS => "Centimeters",
        self::POUNDS => "Pounds",
        self::KILOGRAMS => "Kilograms"
    ];

    /**
     * Find whether the unit of measurement is for height.
     * 
     * @return bool
     */
    public function isHeightMeasure()
    {
        switch ($this->code) {
            case self::INCHES:
            case self::CENTIMETERS:
                return true;
        }

        return false;
    }

    /**
     * Find whether the unit of measurement os for weight.
     * 
     * @return bool
     */
    public function isWeightMeasure()
    {
        switch ($this->code) {
            case self::POUNDS:
            case self::KILOGRAMS:
                return true;
        }

        return false;
    }
}
