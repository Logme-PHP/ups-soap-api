<?php

namespace Logme\Soap\Ups;

/**
 * Alert container.
 */
class Alert extends AbstractModel
{
    /**
     * Warning code returned by the system.
     *
     * @var string
     */
    protected $code;

    /**
     * Warning messages returned by the system.
     *
     * @var string
     */
    protected $description;

    /**
     * Sets the code value.
     *
     * @param string $value
     *
     * @throws Exception
     */
    protected function setCode($value)
    {
        if (strlen($value) < 1 || strlen($value) > 10) {
            throw new \Exception('The string length of code must be between 1 and 10.');
        }

        $this->code = $value;
    }

    /**
     * Sets the description value.
     *
     * @param string $value
     *
     * @throws Exception
     */
    protected function setDescription($value)
    {
        if (strlen($value) < 1 || strlen($value) > 150) {
            throw new \Exception('The string length of description must be between 1 and 150.');
        }

        $this->description = $value;
    }
}
