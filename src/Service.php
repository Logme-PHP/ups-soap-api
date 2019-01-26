<?php

namespace Logme\Soap\Ups;

class Service extends AbstractType
{
    const NEXT_DAY_AIR = '01';
    const SECOND_DAY_AIR = '02';
    const GROUND = '03';
    const THREE_DAY_SELECT = '12';
    const NEXT_DAY_AIR_SAVER = '13';
    const UPS_NEXT_DAY_AIR_EARLY = '14';
    const SECOND_DAY_AIR_AM = '59';
    const WORLDWIDE_EXPRESS = '07';
    const WORLDWIDE_EXPEDITED = '08';
    const STANDARD = '11';
    const WORLDWIDE_EXPRESS_PLUS = '54';
    const SAVER = '65';
    const UPS_WORLDWIDE_EXPRESS_FREIGHT = '96';
    const UPS_WORLDWIDE_EXPRESS_FREIGHT_MIDDAY = '71';
    const UPS_EXPRESS_SAVER = '065';

    /**
     * List with the descriptions for service.
     *
     * Valid domestic values:
     * 01 - Next Day Air
     * 02 - 2nd Day Air
     * 03 - Ground
     * 12 - 3 Day Select
     * 13 - Next Day Air Saver
     * 14 - UPS Next Day Air Early
     * 59 - 2nd Day Air A.M
     *
     * Valid international values:
     * 07 - Worldwide Express
     * 08 - Worldwide Expedited
     * 11 - Standard
     * 54 - Worldwide Express Plus
     * 65 - Saver
     * 96 - UPS Worldwide Express Freight
     * 71 - UPS Worldwide Express Freight Midday
     * 065 - UPS Express Saver
     *
     * @var array
     */
    protected $descriptions = [
        self::NEXT_DAY_AIR => 'Next Day Air',
        self::SECOND_DAY_AIR => '2nd Day Air',
        self::GROUND => 'Ground',
        self::THREE_DAY_SELECT => '3 Day Select',
        self::NEXT_DAY_AIR_SAVER => 'Next Day Air Saver',
        self::UPS_NEXT_DAY_AIR_EARLY => 'UPS Next Day Air Early',
        self::SECOND_DAY_AIR_AM => '2nd Day Air A.M.',
        self::WORLDWIDE_EXPRESS => 'Worldwide Express',
        self::WORLDWIDE_EXPEDITED => 'Worldwide Expedited',
        self::STANDARD => 'Standard',
        self::WORLDWIDE_EXPRESS_PLUS => 'Worldwide Express Plus',
        self::SAVER => 'Saver',
        self::UPS_WORLDWIDE_EXPRESS_FREIGHT => 'UPS Worldwide Express Freight',
        self::UPS_WORLDWIDE_EXPRESS_FREIGHT_MIDDAY => 'UPS Worldwide Express Freight Midday',
        self::UPS_EXPRESS_SAVER => 'UPS Express Saver',
    ];
}
