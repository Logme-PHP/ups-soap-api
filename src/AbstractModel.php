<?php

namespace Logme\Soap\Ups;

abstract class AbstractModel
{
    /**
     * Magic method to write data to inaccessible properties.
     * 
     * @param string $name property name
     * @param mixed $value property value to set
     */
    public function __set($name, $value)
    {
        $setter = "set" . ucfirst($name);

        if (!method_exists($this, $setter)) {
            throw new \Exception("Unrecognized method {$setter}.");
        }

        $this->$setter($value);
    }

    /**
     * Magic method to read data from inaccessible properties.
     * 
     * @param string $name property name
     * @return mixed
     */
    public function __get($name)
    {
        $getter = lcfirst($name);

        if (!property_exists($this, $getter)) {
            throw new \Exception("Unrecognized attribute {$getter}.");
        }

        return $this->$getter;
    }
}
