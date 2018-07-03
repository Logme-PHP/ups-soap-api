<?php

namespace Logme\Soap\Ups;

class Currency extends AbstractModel
{
    /**
     * Access Point COD currency code.
     * Required if Access Point COD container is present.
     * UPS does not suport all internacional currency codes.
     * 
     * @var string
     */
    protected $currencyCode;

    /**
     * Access Point COD monetary value.
     * Required of Access Point COD container is present.
     * 
     * @var string
     */
    protected $monetaryValue;

    /**
     * Sets currency code.
     * 
     * @param string $value
     * @throws Exception
     */
    public function setCurrencyCode($value)
    {
        if (strlen($value) > 3) {
            throw new \Exception("The string length of currency code must be less or equal to 3.");
        }

        $this->currencyCode = $value;
    }

    /**
     * Sets monetary value.
     * 
     * @param string $value
     */
    public function setMonetaryValue($value)
    {
        if (strlen($value) > 8) {
            throw new \Exception("The string length of monetary value must be less or equal to 8.");
        }

        $this->monetaryValue = $value;
    }
}
