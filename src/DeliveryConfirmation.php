<?php

namespace Logme\Soap\Ups;

class DeliveryConfirmation extends AbstractModel
{
    const DELIVERY_CONFIRMATION = "1";
    const DELIVERY_CONFIRMATION_SIGNATURE_REQUIRED = "2";
    const DELIVERY_CONFIRMATION_ADULT_SIGNATURE_REQUIRED = "3";

    /**
     * Type of delivery confirmation.
     *
     * @var string
     */
    protected $DCISType;

    /**
     * @test Sets DCIS type attribute value.
     *
     * @param string $value
     * @throws Exception
     */
    public function setDcisType($value)
    {
        switch ($value) {
            case self::DELIVERY_CONFIRMATION:
            case self::DELIVERY_CONFIRMATION_SIGNATURE_REQUIRED:
            case self::DELIVERY_CONFIRMATION_ADULT_SIGNATURE_REQUIRED:
                $this->DCISType = $value;
                break;
            default:
                throw new \Exception("Cannot set attribute with an invalid value.");
        }
    }
}
