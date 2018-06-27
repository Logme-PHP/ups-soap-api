<?php

namespace Logme\Soap\Ups;

class PickupType extends AbstractModel
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
    private $descriptions = [
        self::DAILY_PICKUP => "Daily Pickup",
        self::CUSTOMER_COUNTER => "Customer Counter",
        self::ONE_TIME_PICKUP => "One Time Pickup",
        self::LETTER_CENTER => "Letter Center",
        self::AIR_SERVICE_CENTER => "Air Service Center"
    ];

    /**
     * Pickup type code.
     * 
     * @var string
     */
    protected $code;

    /**
     * Pickup type description.
     * Ignored if provided in the request.
     * 
     * @var string
     */
    protected $description;

    /**
     * Create a new Pickup Type instance.
     */
    public function __construct()
    {
        $this->code = self::DAILY_PICKUP;
        $this->description = $this->descriptions[self::DAILY_PICKUP];
    }

    /**
     * Set the code attribute.
     * Valid values:
     * 01 - Daily Pickup (Default)
     * 03 - Customer Counter
     * 06 - One Time Pickup
     * 19 - Letter Center
     * 20 - Air Service Center
     * If invalid value is provided, default will be used.
     * Length is not validated.
     * When negotiated rates are requested, 07 (onCallAir) will be ignored.
     * 
     * @param string $value
     * @throws Exception
     */
    public function setCode($value)
    {
        switch ($value) {
            case self::DAILY_PICKUP:
            case self::CUSTOMER_COUNTER:
            case self::ONE_TIME_PICKUP:
            case self::LETTER_CENTER:
            case self::AIR_SERVICE_CENTER:
                $this->code = $value;
                $this->description = $this->descriptions[$value];
                break;
            default:
                throw new \Exception("Cannot set an invalid code value.");
        }
    }
}