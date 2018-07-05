<?php

namespace Logme\Soap\Ups;

class UnitOfMeasurement extends AbstractType
{
    const INCHES = "IN";
    const CENTIMETERS = "CM";
    const POUNDS = "LBS";
    const KILOGRAMS = "KGS";
    const POUNDS_CODE = "01";
    const KILOGRAMS_CODE = "00";

    /**
     * List with descriptions for unit of measurement.
     *
     * @var array
     */
    protected $descriptions = [
        self::INCHES => "Inches",
        self::CENTIMETERS => "Centimeters",
        self::POUNDS => "Pounds",
        self::KILOGRAMS => "Kilograms",
        self::POUNDS_CODE => "Pounds",
        self::KILOGRAMS_CODE => "Kilograms"
    ];

    /**
     * A flag indicating if the weight value is used as code.
     *
     * @var bool
     */
    protected $useWeightMeasureAsCode = false;

    /**
     * Sets the use weight measure as code attribute.
     *
     * @param bool $value
     * @throws Exception
     */
    public function setUseWeightMeasureAsCode($value)
    {
        if (!is_bool($value)) {
            throw new \Exception("The use weight measure as code value must be a boolean type.");
        }

        $this->useWeightMeasureAsCode = $value;
    }

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
        $measure = $this->useWeightMeasureAsCode
            ? [ self::POUNDS_CODE, self::KILOGRAMS_CODE ]
            : [ self::POUNDS, self::KILOGRAMS ];

        if (in_array($this->code, $measure)) {
            return true;
        }

        return false;
    }
}
