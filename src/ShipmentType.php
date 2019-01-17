<?php

namespace Logme\Soap\Ups;

class ShipmentType extends AbstractType
{
    const PACKAGE = '01';
    const FREIGHT = '02';
    const MAIL_INNOVATIONS = '03';

    /**
     * List with descriptions for type code.
     *
     * @var array
     */
    protected $descriptions = [
        self::PACKAGE => 'Package',
        self::FREIGHT => 'Freight',
        self::MAIL_INNOVATIONS => 'Mail Innovations',
    ];
}
