<?php 

namespace Logme\Soap\Ups;

class DryIce extends AbstractModel
{
    /**
     * Valid values for regulation set.
     * CFR - For HazMat regulated by US Dept of transportation within the U.S.
     * or ground shipments to Canada.
     * IATA - For Worldwide Air movement.
     *
     * @var array
     */
    private $regulationsSets = [
        "CDR",
        "IATA"
    ];

    /**
     * Regulation set for DryIce shipment.
     *
     * @var string
     */
    protected $regulationSet;

    /**
     * Container for weight information for DryIce.
     *
     * @var Weight
     */
    protected $dryIceWeight;

    /**
     * Create a new dry ice instance.
     */
    public function __construct()
    {
        $this->dryIceWeight = new Weight();
        $this->dryIceWeight->unitOfMeasurement->useWeightMeasureAsCode = true;
    }

    /**
     * Sets the regulation set attribute.
     *
     * @param string $value
     * @throws Exception
     */ 
    public function setRegulationSet($value)
    {
        if (!in_array($value, $this->regulationsSets)) {
            throw new \Exception("Cannot set the regulation set with an unexpected value.");
        }
        
        $this->regulationSet = $value;
    }

    /**
     * Sets the dry ice weight attribute.
     *
     * @param Weight $value
     */
    public function setDryIceWeight(Weight $value)
    {
        $this->dryIceWeight = $value;
    }
}
