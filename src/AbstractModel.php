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
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        $getter = lcfirst($name);

        if (!property_exists($this, $getter)) {
            throw new \Exception("Unrecognized attribute {$name}.");
        }

        return $this->$getter;
    }

    /**
     * Convert all assigned properties to json string.
     * 
     * @return string
     */
    public function toJson() : string
    {   
        return json_encode($this->toArray());
    }

    /**
     * Convert all assigned properties to array.
     * 
     * @return array
     */
    public function toArray() : array
    {
        $array = get_object_vars($this);

        return array_filter($this->upperPropertyName($array));
    }

    /**
     * Uppercase the first letter for each property.
     * 
     * @param array $array
     * @return array
     */
    private function upperPropertyName(array $array) : array
    {
        foreach ($array as $key => $value) {
            unset($array[$key]);
            $upperKey = ucfirst($key);

            if (!is_null($value)) {
                $array[$upperKey] = is_object($value) ? 
                    $this->upperPropertyName(get_object_vars($value)) : $value;
            }

            if (is_array($array[$upperKey])) {
                $array[$upperKey] = $this->upperPropertyName($array[$upperKey]);
            }
        }

        return $array;
    }
}
