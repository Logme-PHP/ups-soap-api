<?php

namespace Logme\Soap\Ups;

class CashOnDelivery extends AbstractModel
{
    /**
     * Indicates the type of funds that will be used for the C.O.D payment.
     *
     * @var string
     */
    protected $CODFundsCode;

    /**
     * Currency container for cash on delivery amount.
     *
     * @var Currency
     */
    protected $CODAmount;

    /**
     * Create a new cash on delivery instance.
     */
    public function __construct()
    {
        $this->CODAmount = new Currency();
    }

    /**
     * Sets the COD funds code.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setCODFundsCode($value)
    {
        if (strlen($value) > 1) {
            throw new \Exception('The string length of COD Funds code must be equal to 1.');
        }

        $this->CODFundsCode = $value;
    }

    /**
     * Sets the COD amount container.
     *
     * @param Currency $value
     */
    public function setCODAmount(Currency $value)
    {
        $this->CODAmount = $value;
    }
}
