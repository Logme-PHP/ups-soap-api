<?php

namespace Logme\Soap\Ups;

class HazMatChemicalRecord extends AbstractModel
{
    const HIGHWAY = '01';
    const GROUND = '02';
    const PASSENGER_AIRCRAFT = '03';
    const CARGO_AIRCRAFT_ONLY = '04';

    const FULLY_REGULATED = 'FR';
    const LIMITED_QUANTITY = 'LQ';
    const EXCEPTED_QUANTITY = 'EQ';
    const LIGHTLY_REGULATED = 'LR';

    /**
     * Valid values for Regulatory Set.
     *
     * @var array
     */
    private $regulationSets = [
        'ADR',
        'CFR',
        'IATA',
        'TDG',
    ];

    /**
     * Valid values for packaging group type.
     *
     * @var array
     */
    private $packagingGroupTypes = [
        'I',
        'II',
        'III',
        '',
    ];

    /**
     * Identifies the Chemical record.
     * Required if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $chemicalRecordIdentifier;

    /**
     * This is hazard class associated to specified commodity.
     * Required if CommodityRegulatedLevelCode is 'LQ' or 'FR'.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $classDivisionNumber;

    /**
     * This is the ID number (UN/NA/ID) for the specified commodity.
     * Required if CommodityRegulatedLevelCode = LR, LQ or FR and if the field
     * applies to the material by regulation.
     * UN/NA/ID Identification Number assigned to the specified regulated good.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $IDNumber;

    /**
     * The method of transport by which a shipment is approved to move and the
     * regulations associated with that method.
     * Only required when the CommodityRegulatedLevelCode is FR or LQ.
     * Applies only if Sub Version is greater than or equal to 1701.
     * For multiple ChemicalRecords per package having different TransportationMode,
     * TransportationMode of first ChemicalRecord would be considered for validating
     * and rating the package.
     * All TransportationMode except for '04', are general service offering. If any
     * Chemical record contains '04' as TransportationMode, ShipperNumber needs be
     * authorized to use '04' as TransportationMode.
     *
     * @var string
     */
    protected $transportationMode;

    /**
     * The Regulatory set associated with every regulated shipment.
     * It must be the same across the shipment.
     * Applies only if Sub Version is greater than or equal to 1701.
     * For multiple ChemicalRecords per package or multiple packages containing
     * different RegulationSet, RegulationSet of first ChemicalRecord would be
     * considered for validating and rating the entire shipment.
     *
     * @var string
     */
    protected $regulationSet;

    /**
     * 24 Hour Emergency Phone Number of the shipper.
     * Valid values for this field are (0) through (9) with trailling blanks.
     * For numbers within the U.S., the layout is '1', area code, 7-digit number.
     * For all other countries or terrotories the layout is country or territory
     * code, area code, number.
     * Applies only if Sub Version is greater than or equal to 1701.
     * The following are restricted in the phone number period ".", "-", plus
     * sign "+" and conventional parentheses "(" and ")", "EXT or OPT".
     *
     * @var string
     */
    protected $emergencyPhone;

    /**
     * The emergency information, contact name and/or contact number, required
     * to be communicated when a call is placed to the EmergencyPhoneNumber.
     * The information is required if there is a value in the EmergencyPhoneNumber
     * field above and the shipment is with a US50 or PR origin and/or destination
     * and the RegulationSet is IATA.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $emergencyContact;

    /**
     * Required if CommodityRegulatedLevelCode = LQ or FR and if the field applies
     * to the material by regulation.
     * If reportable quantity is met, 'RQ' should be entered.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $reportableQuantity;

    /**
     * Required if CommodityRegulatedLevel Code = LQ or FR and if the field applies
     * to the material by regulation.
     * Secondary hazardous characteristics of a package.
     * (There can ne more than one - separate each a comma)
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $subRiskClass;

    /**
     * This is the packing group category associated to the specified commodity.
     * Required if CommodityRegulatorLevelCode = LQ or FR and if the field applies
     * to the material by regulation. Must be shown in Roman Numerals.
     * Applies only of Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $packagingGroupType;

    /**
     * Required if CommodityRegulatedLevelCode = LQ or FR. The numerical value
     * of the mass capacity if the regulated good.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $quantity;

    /**
     * Required if CommodityRegulatedLevelCode = LQ or FR.
     * The unit of measure used for the mass capacity of the regulated good.
     * For Example: ml, L, g, mg, kg, cylinder, pound, pint, quart, gallon,
     * ounce, etc.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $UOM;

    /**
     * The packaging instructions related to the chemical record.
     * Required if CommodityRegulatedLevelCode = LQ or FR and if the field applies
     * to material by regulation.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $packagingInstructionCode;

    /**
     * The Proper Shipping Name assigned by ADR, CFR or IATA.
     * Required if CommodityRegulatedLevelCode = LQ or FR and if the field applies
     * to the material by regulation.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $properShippingName;

    /**
     * The technical name (when required) for the specified commodity.
     * Required if CommodityRegulatedLevelCode = LQ or FR and if the field applies
     * to the material by regulation.
     *
     * @var string
     */
    protected $technicalName;

    /**
     * Additional remarks or special provision information.
     * Required if CommodityRegulatedLevelCode = LQ or FR and if the field applies
     * to the material by regulation.
     * Additional information that may be required by regulation about a hazardous
     * material, such as, "Limited Quantity", DOT-SP numbers, EX numbers.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $additionalDescription;

    /**
     * The package type code identifying the type of packaging used for the
     * commodity. (Ex: Fiberboard Box).
     * Required if CommodityRegulatedLevelCode = LQ or FR.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $packagingType;

    /**
     * Defines the type of label that is required on the package for the
     * commpdity. Not applicable if CommodityRegulatedLevelCode = LR or EQ.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $hazardLabelRequired;

    /**
     * The number of pieces of the specific commodity.
     * Required if CommodityRegulatedLevelCode = LQ or FR.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $packagingTypeQuantity;

    /**
     * Indicates the type of commodity.
     * Fully Regulated (FR)
     * Limited Quantity (LQ)
     * Excepted Quantity (EQ)
     * Lightly Regulated (LR)
     * Default value is FR
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $commodityRegulatedLevelCode = self::FULLY_REGULATED;

    /**
     * Transport Category.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $transportCategory;

    /**
     * Defines what is restricted to pass through a tunnel.
     * Applies only if Sub Version is greater than or equal to 1701.
     *
     * @var string
     */
    protected $tunnelRestrictionCode;

    /**
     * Container to hold Dry Ice information.
     *
     * @var DryIce.
     */
    protected $dryIce;

    /**
     * Sets the chemical record identifier attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setChemicalRecordIdentifier($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 3) {
            throw new \Exception('The string length of chemical record identifier must be between 1 and 3.');
        }

        $this->chemicalRecordIdentifier = $value;
    }

    /**
     * Sets the class division number attribute.
     * Valid values:
     * 01 - Highway
     * 02 - Ground
     * 03 - Passager Aircraft
     * 04 - Cargo Aircraft Only.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setClassDivisionNumber($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 7) {
            throw new \Exception('The string length of class division number must be between 1 and 7.');
        }

        $this->classDivisionNumber = $value;
    }

    /**
     * Sets the ID number attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setIDNumber($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 6) {
            throw new \Exception('The string length of ID number must be between 1 and 6.');
        }

        $this->IDNumber = $value;
    }

    /**
     * Sets the transportation mode attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setTransportationMode($value)
    {
        switch ($value) {
            case self::HIGHWAY:
            case self::GROUND:
            case self::PASSENGER_AIRCRAFT:
            case self::CARGO_AIRCRAFT_ONLY:
                $this->transportationMode = $value;
                break;
            default:
                throw new \Exception('Cannot set the transportation mode with an unexpected value.');
        }
    }

    /**
     * Sets the regulation set attribute.
     * Valid values:
     * ADR - For Europe to Europe Ground Movement
     * CFR - For HazMat regulated by US Dept. of Transportation within hte U.S or ground shipments to Canada
     * IATA - For Worldwide Air movement
     * TDG - For Canada to Canada ground movement or Canada to U.S standard movement.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setRegulationSet($value)
    {
        if (!in_array($value, $this->regulationSets)) {
            throw new \Exception('Cannot set the regulation set with an unexpected value.');
        }

        $this->regulationSet = $value;
    }

    /**
     * Sets the emergency phone attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setEmergencyPhone($value)
    {
        if (strlen($value) > 25) {
            throw new \Exception('The string length of emergency phone must be less than or equal to 25.');
        }

        preg_match_all('/^([0-9\s]+)$/', $value, $matches, PREG_SET_ORDER, 0);

        if (!$matches) {
            throw new \Exception('The string have invalid chars for emergency phone.');
        }

        $this->emergencyPhone = $value;
    }

    /**
     * Sets the emergency contact attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setEmergencyContact($value)
    {
        if (strlen($value) > 35) {
            throw new \Exception('The string length of emergency contact must be less than or equal to 35.');
        }

        $this->emergencyContact = $value;
    }

    /**
     * Sets the reportable quantity attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setReportableQuantity($value)
    {
        if (strlen($value) > 2) {
            throw new \Exception('The string length of reportable quantity must be less than or equal to 2.');
        }

        $this->reportableQuantity = $value;
    }

    /**
     * Sets the sub risk class attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setSubRiskClass($value)
    {
        if (strlen($value) > 100) {
            throw new \Exception('The string length of sub risk class must be less than or equal to 100.');
        }

        $this->subRiskClass = $value;
    }

    /**
     * Sets the packaging group type attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setPackagingGroupType($value)
    {
        if (!in_array($value, $this->packagingGroupTypes)) {
            throw new \Exception('The string length of packaging group type with an unexpected value.');
        }

        $this->packagingGroupType = $value;
    }

    /**
     * Sets the quantity attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setQuantity($value)
    {
        if (strlen($value) > 15) {
            throw new \Exception('The string length of quantity must be less than or equal to 15.');
        }

        if (!is_numeric($value)) {
            throw new \Exception('The quantity value needs to be numeric type.');
        }

        $this->quantity = $value;
    }

    /**
     * Sets the UOM attribute.
     *
     * @param string $value
     */
    public function setUOM($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 10) {
            throw new \Exception('The string length of UOM must be between 1 and 10.');
        }

        $this->UOM = $value;
    }

    /**
     * Sets the packaging instruction code attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setPackagingInstructionCode($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 353) {
            throw new \Exception('The string length of packaging instruction code must be between 1 and 353.');
        }

        $this->packagingInstructionCode = $value;
    }

    /**
     * Sets the proper shipping name attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setProperShippingName($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 250) {
            throw new \Exception('The string length of proper shipping name must be between 1 and 250.');
        }

        $this->properShippingName = $value;
    }

    /**
     * Sets the techincal name attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setTechnicalName($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 300) {
            throw new \Exception('The string length of technical name must be between 1 and 300.');
        }

        $this->technicalName = $value;
    }

    /**
     * Sets the aditional description attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setAdditionalDescription($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 75) {
            throw new \Exception('The string length of additional description must be between 1 and 75.');
        }

        $this->additionalDescription = $value;
    }

    /**
     * Sets the packaging type attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setPackagingType($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 250) {
            throw new \Exception('The string length of packaging type must be between 1 and 255.');
        }

        $this->packagingType = $value;
    }

    /**
     * Sets the hazard level required attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setHazardLabelRequired($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 50) {
            throw new \Exception('The string length of hazard label required must be between 1 and 50.');
        }

        $this->hazardLabelRequired = $value;
    }

    /**
     * Sets the packaging type quantity attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setPackagingTypeQuantity($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 3) {
            throw new \Exception('The string length of packaging type quantity must be between 1 and 3.');
        }

        if (!is_numeric($value)) {
            throw new \Exception('The packaging type quantity only accepts numerical values.');
        }

        $this->packagingTypeQuantity = $value;
    }

    /**
     * Sets the commodity regulated level code attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setCommodityRegulatedLevelCode($value)
    {
        switch ($value) {
            case self::FULLY_REGULATED:
            case self::LIMITED_QUANTITY:
            case self::EXCEPTED_QUANTITY:
            case self::LIGHTLY_REGULATED:
                $this->commodityRegulatedLevelCode = $value;
                break;
            default:
                throw new \Exception('Cannot set the commodity regulated level code with an unexpected value.');
        }
    }

    /**
     * Sets the category transport attribute.
     * Valid values are 0 to 4.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setTransportCategory($value)
    {
        if (!is_numeric($value)) {
            throw new \Exception('The transport category only accepts numerical values.');
        }

        if ($value < 0 || $value > 4) {
            throw new \Exception('The transport category value must be between 0 and 4.');
        }

        $this->transportCategory = $value;
    }

    /**
     * Sets the tunnel restriction code attribute.
     *
     * @param string $value
     *
     * @throws Exception
     */
    public function setTunnelRestrictionCode($value)
    {
        $len = strlen($value);

        if ($len < 1 || $len > 10) {
            throw new \Exception('The string length of tunnel restriction code must be between 1 and 10.');
        }

        $this->tunnelRestrictionCode = $value;
    }
}
