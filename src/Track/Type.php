<?php

namespace Logme\Soap\Ups\Track;

use Logme\Soap\Ups\AbstractType;

class Type extends AbstractType
{
    const SHIPPER_ADDRESS = '01';
    const SHIP_TO_ADDRESS = '02';

    /**
     * List with descriptions for type code.
     *
     * @var array
     */
    protected $descriptions = [
        self::SHIPPER_ADDRESS => 'Shipper Address',
        self::SHIP_TO_ADDRESS => 'ShipTo Address',
    ];
}
