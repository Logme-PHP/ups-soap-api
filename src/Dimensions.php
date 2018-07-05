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
     * Length of the package used to determine dimensional weight.
     * Required for GB to GB and Poland to Poland shipments.
     *
     * @var string
     */
    protected $length;

    /**
     * Width of the package used to determine dimensional weight.
     * Required for GB to GB and Poland to Poland shipments.
     *
     * @var string
     */
    protected $width;

    /**
     * Height of the package used to determine dimensional weight.
     * Required for GB to GB and Poland to Poland shipments.
     *
     * @var string
     */
    protected $height;

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

    /**
     * Sets the dimension value for length.
     *
     * @param string $value
     */
    public function setLength($value)
    {
        $this->setDimension("length", $value);
    }

    /**
     * Sets the dimension value for width.
     *
     * @param string $value.
     */
    public function setWidth($value)
    {
        $this->setDimension("width", $value);
    }

    /**
     * Sets the dimension value for height.
     *
     * @param string $value
     */
    public function setHeight($value)
    {
        $this->setDimension("height", $value);
    }

    /**
     * Sets the dimension value for the attribute.
     *
     * @param string $attribute
     * @param string $value
     * @throws Exception
     */
    private function setDimension($attribute, $value)
    {
        if (strlen($value) > 6) {
            throw new \Exception("The string length of {$attribute} must be less or equal to 6.");
        }

        $this->$attribute = $value;
    }
}
