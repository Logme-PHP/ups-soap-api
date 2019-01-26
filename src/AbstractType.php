<?php

namespace Logme\Soap\Ups;

abstract class AbstractType extends AbstractModel
{
    /**
     * List with descriptions for type code.
     *
     * @var array
     */
    protected $descriptions = [];

    /**
     * Type code.
     *
     * @var string
     */
    protected $code;

    /**
     * The description of the code that representing the type.
     *
     * @var string
     */
    protected $description;

    /**
     * Sets the type code.
     *
     * @param string $value
     *
     * @throws Exception
     */
    protected function setCode($value)
    {
        $this->description = array_key_exists($value, $this->descriptions) ?
            $this->descriptions[$value] :
            'Unknown code';

        $this->code = $value;
    }

    /**
     * Sets the description.
     *
     * @param string $value
     */
    protected function setDescription($value)
    {
        $this->description = $value;
    }
}
