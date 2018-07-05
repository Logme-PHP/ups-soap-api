<?php

namespace Logme\Soap\Ups;

class CustomerClassification extends AbstractType
{
    const RATES_ASSOCIATED_WITH_SHIPPER_NUMBER = "00";
    const DAILY_RATES = "01";
    const RETAIL_RATES = "04";
    const GENERAL_LIST_RATES = "05";
    const STANDARD_LIST_RATES = "53";

    /**
     * List with descriptions for customer classification codes.
     *
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
     * @var array
     */
    protected $descriptions = [
        self::RATES_ASSOCIATED_WITH_SHIPPER_NUMBER => "Rates associated with shipper number",
        self::DAILY_RATES => "Daily Rates",
        self::RETAIL_RATES => "Retail Rates",
        self::GENERAL_LIST_RATES => "General List Rates",
        self::STANDARD_LIST_RATES => "Standard List Rates"
    ];
}
