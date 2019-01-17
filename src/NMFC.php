<?php

namespace Logme\Soap\Ups;

class NMFC extends AbstractModel
{
    /**
     * Value of NMFC Prime.
     * Require if NMFC container is present. For GFP only.
     *
     * @var string
     */
    protected $primeCode;

    /**
     * Value of NMFC Sub.
     * Need to be provided when the SubCode associated with the PrimeCode is other than 00.
     * API defaults the sub value to 00 if not provided.
     * If provided the SubCode should be associated with the PrimeCode of NMFC.
     *
     * @var string
     */
    protected $subCode;

    /**
     * Create a new NMFC instance.
     */
    public function __construct()
    {
        $this->subCode = '00';
    }

    /**
     * Sets prime code value.
     *
     * @param string $value;
     *
     * @throws Exception
     */
    public function setPrimeCode($value)
    {
        if (strlen($value) < 4 || strlen($value) > 6) {
            throw new \Exception('The string length of prime code must be between 4 and 6.');
        }

        $this->primeCode = $value;
    }

    /**
     * Sets the sub code value.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setSubCode($value)
    {
        if (strlen($value) > 2) {
            throw new \Exception('The string length of sub code must be less or equal to 2.');
        }

        $this->subCode = $value;
    }
}
