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
        if (!array_key_exists($value, $this->descriptions)) {
            throw new \Exception('Cannot set an invalid code value.');
        }

        $this->code = $value;
        $this->description = $this->descriptions[$value];
    }
}
