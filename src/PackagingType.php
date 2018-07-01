<?php

namespace Logme\Soap\Ups;

class PackagingType extends AbstractType
{
    const UNKNOWN = "00";
    const UPS_LETTER = "01";
    const PACKAGE = "02";
    const TUBE = "03";
    const PAK = "04";
    const EXPRESS_BOX = "21";
    const TWENTY_FIVE_KG_BOX = "24";
    const TEN_KG_BOX = "25";
    const PALLET = "30";
    const SMALL_EXPRESS_BOX = "2a";
    const MEDIUM_EXPRESS_BOX = "2b";
    const LARGE_EXPRESS_BOX = "2c";

    /**
     * List with the descriptions for packages.
     * 
     * @var array
     */
    protected $descriptions = [
        self::UNKNOWN => "UNKNOWN",
        self::UPS_LETTER => "UPS Letter",
        self::PACKAGE => "Package",
        self::TUBE => "Tube",
        self::PAK => "Pak",
        self::EXPRESS_BOX => "Express Box",
        self::TWENTY_FIVE_KG_BOX => "25KG Box",
        self::TEN_KG_BOX => "10KG Box",
        self::PALLET => "Pallet",
        self::SMALL_EXPRESS_BOX => "Small Express Box",
        self::MEDIUM_EXPRESS_BOX => "Medium Express Box",
        self::LARGE_EXPRESS_BOX => "Large Express Box"
    ];
}
