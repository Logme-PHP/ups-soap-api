<?php

namespace Logme\Soap\Ups;

class PickupType extends AbstractType
{
    const DAILY_PICKUP = "01";
    const CUSTOMER_COUNTER = "03";
    const ONE_TIME_PICKUP = "06";
    const LETTER_CENTER = "19";
    const AIR_SERVICE_CENTER = "20";

    /**
     * List with descriptions for pickup type.
     * 
     * @var array
     */
    protected $descriptions = [
        self::DAILY_PICKUP => "Daily Pickup",
        self::CUSTOMER_COUNTER => "Customer Counter",
        self::ONE_TIME_PICKUP => "One Time Pickup",
        self::LETTER_CENTER => "Letter Center",
        self::AIR_SERVICE_CENTER => "Air Service Center"
    ];
}
