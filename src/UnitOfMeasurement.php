<?php

namespace Logme\Soap\Ups;

class UnitOfMeasurement extends AbstractType
{
    const INCHES = "IN";
    const CENTIMETERS = "CM";

    /**
     * List with descriptions for unit of measurement.
     * 
     * @var array
     */
    protected $descriptions = [
        self::INCHES => "Inches",
        self::CENTIMETERS => "Centimeters"
    ];
}
