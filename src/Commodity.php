<?php

namespace Logme\Soap\Ups;

class Commodity extends AbstractModel
{
    /**
     * Freight classification. Freight class partially determines the freight rate for the article.
     *
     * @var string
     */
    protected $freightClass;

    /**
     * NMFC Container instance.
     * For GFP Only.
     *
     * @var NMFC
     */
    protected $NMFC;

    /**
     * Create a new commodity instance.
     */
    public function __construct()
    {
        $this->NMFC = new NMFC();
    }

    /**
     * Sets the freight class attribute.
     *
     * @param string $value
     * @throws Exception
     */
    public function setFreightClass($value)
    {
        if (strlen($value) > 10) {
            throw new \Exception("The string length of freight class must be less or equal to 10.");
        }

        $this->freightClass = $value;
    }

    /**
     * Sets the NFMC container.
     *
     * @param NMFC $value
     */
    public function setNMFC(NMFC $value)
    {
        $this->NMFC = $value;
    }
}
