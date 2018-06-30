<?php

namespace Logme\Soap\Ups;

class CustomerClassification extends AbstractModel
{
    const RATES_ASSOCIATED_WITH_SHIPPER_NUMBER = "00";
    const DAILY_RATES = "01";
    const RETAIL_RATES = "04";
    const GENERAL_LIST_RATES = "05";
    const STANDARD_LIST_RATES = "53";

    /**
     * List with descriptions for customer classification codes.
     * 
     * @var array
     */
    private $descriptions = [
        self::RATES_ASSOCIATED_WITH_SHIPPER_NUMBER => "Rates associated with shipper number",
        self::DAILY_RATES => "Daily Rates",
        self::RETAIL_RATES => "Retail Rates",
        self::GENERAL_LIST_RATES => "General List Rates",
        self::STANDARD_LIST_RATES => "Standard List Rates"
    ];

    /**
     * Customer classification code.
     * 
     * @var string
     */
    protected $code;

    /**
     * Customer classification description of the code.
     * Ignored if provided in the Request. Length is not validated.
     * 
     * @var string
     */
    protected $description;

    /**
     * Set the code attribute.
     * Valid values:
     * 00 - Rates Associated with shipper number.
     * 01 - Daily Rates.
     * 04 - Retail Rates.
     * 05 - General List Rates.
     * 53 - Standard List Rates.
     * Length is not valid validated.
     * If customer classification code is not provided or it is not provided or it is provided with an invalid value,
     * UPS would use rate chart (customer classification code associated with shipper country or territory to rate the shipments).
     * 
     * @param string $value 
     * @throws Exception
     */
    public function setCode($value)
    {
        switch ($value) {
            case self::RATES_ASSOCIATED_WITH_SHIPPER_NUMBER:
            case self::DAILY_RATES:
            case self::RETAIL_RATES:
            case self::GENERAL_LIST_RATES:
            case self::STANDARD_LIST_RATES:
                $this->code = $value;
                $this->description = $this->descriptions[$value];
                break;
            default:
                throw new \Exception("Cannot set an invalid code value.");
        }
    }
}
