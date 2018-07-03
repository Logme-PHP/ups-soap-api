<?php

namespace Logme\Soap\Ups;

class HazMat extends AbstractModel
{
    /**
     * Identifies the packages containing Dangerous Goods.
     * Required if sub version is greater than or equal to 1701.
     * 
     * @var string
     */
    protected $packageIdentifier;

    /**
     * QValue is required when a HazMat shipment specifies AllPackedInOneIndicator
     * and the regulation set for that shipment is IATA.
     * Applies only if Sub Version is greater than or equal to 1701.
     * Valid values are: 0.1; 0.2, 0.3; 0.4; 0.5; 0.6; 0.7; 0.8; 0.9; 1.0
     * 
     * @var string
     */
    protected $QValue;

    /**
     * Sets the package identifier value.
     * 
     * @param string $value
     * @throws Exception
     */
    public function setPackageIdentifier($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 5) {
            throw new \Exception("The string length of package identifier must be between 1 and 5.");
        }

        $this->packageIdentifier = $value;
    }

    /**
     * Sets the QValue attribute.
     * 
     * @param string $value
     */
    public function setQValue($value)
    {
        $values = [ "0.1", "0.2", "0.3", "0.4", "0,5", "0.6", "0.7", "0.8", "0.9", "1.0"];

        if (!in_array($value, $values)) {
            throw new \Exception("Cannot set QValue with an unexpected value.");
        }

        $this->QValue = $value;
    }
}
