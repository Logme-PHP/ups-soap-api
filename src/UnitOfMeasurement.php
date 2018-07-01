<?php

namespace Logme\Soap\Ups;

class UnitOfMeasurement extends AbstractModel
{
    const INCHES = "IN";
    const CENTIMETERS = "CM";

    /**
     * List with descriptions for unit of measurement.
     * 
     * @var array
     */
    private $descriptions = [
        self::INCHES => "Inches",
        self::CENTIMETERS => "Centimeters"
    ];

    /**
     * Package dimensions unit of measurement code.
     * 
     * @var string
     */
    protected $code;

    /**
     * Text description of the code representin the unit of measurement associated with the package.
     * 
     * @var string
     */
    protected $description;

    /**
     * Sets the package dimensions unit of measurement code.
     * 
     * @param string $value
     * @throws Exception
     */
    public function setCode($value)
    {
        if (!array_key_exists($value, $this->descriptions)) {
            throw new \Exception("Cannot set an invalid code value.");
        }

        $this->code = $value;
        $this->description = $this->descriptions[$value];
    }
}
