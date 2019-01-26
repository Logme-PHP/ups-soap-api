<?php

namespace Logme\Soap\Ups;

abstract class AbstractModel
{
    /**
     * Magic method to write data to inaccessible properties.
     *
     * @param string $name  property name
     * @param mixed  $value property value to set
     */
    public function __set($name, $value)
    {
        $setter = 'set'.ucfirst($name);

        if (!method_exists($this, $setter)) {
            throw new \Exception("Unrecognized method {$setter}.");
        }

        $this->$setter($value);
    }

    /**
     * Magic method to read data from inaccessible properties.
     *
     * @param string $name property name
     *
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
     * Intend to make object conversion to instantiated class.
     *
     * @return object
     */
    public function toObject($value)
    {
        $this->instantiateProperty($this, $value);
    }

    /**
     * Uppercase the first letter for each property.
     *
     * @param array $array
     *
     * @return array
     */
    private function upperPropertyName(array $array) : array
    {
        foreach ($array as $key => $value) {
            unset($array[$key]);
            $upperKey = ucfirst($key);

            if ($upperKey == 'ShipmentType') var_dump($value);

            if (!is_null($value)) {
                $array[$upperKey] = is_object($value) ?
                    $this->upperPropertyName(get_object_vars($value)) : $value;
            }

            if (is_array($array[$upperKey]) && count($array[$upperKey]) > 0) {
                $array[$upperKey] = $this->upperPropertyName($array[$upperKey]);
            }
        }

        return $array;
    }

    /**
     * Instantiate objects properties dynamically.
     *
     * @param string $class
     * @param object $object
     *
     * @return object
     */
    private function instantiateProperty($class, $object)
    {
        foreach ($object as $key => $value) {
            $k = lcfirst($key);
            if (property_exists($class, $k)) {
                $setMethod = 'set'.$key;
                if (is_array($class->$k)) {
                    $array = $class->$k;
                    if (is_array($value)) {
                        foreach ($value as $val) {
                            $c = $this->getValidClass($class, $key);
                            $v = $this->instantiateProperty($c, $val);
                            $array[] = $v;
                        }
                    } elseif (is_object($value)) {
                        $c = $this->getValidClass($class, $k);
                        $v = $this->instantiateProperty($c, $value);
                        $array[] = $v;
                    } else {
                        $array[] = $value;
                    }
                    call_user_func([$class, $setMethod], $array);
                } elseif (is_object($value)) {
                    $c = $this->getValidClass($class, $k);
                    $v = $this->instantiateProperty($c, $value);
                    call_user_func([$class, $setMethod], $v);
                } else {
                    call_user_func([$class, $setMethod], $value);
                }
            }
        }

        return $class;
    }

    /**
     * Instantiate a valid class.
     *
     * @param string $class
     * @param string $key
     *
     * @return string
     */
    private function getValidClass($class, $key)
    {
        $instance = $this->getValidNamespace($class, $key);

        $reflection = new \ReflectionClass($instance);

        return $reflection->newInstanceWithoutConstructor();
    }

    /**
     * Get a valid namespace for class.
     *
     * @param string $class
     * @param string $key
     *
     * @return string
     */
    private function getValidNamespace($class, $key)
    {
        $reflection = new \ReflectionClass($class);
        $namespace = $reflection->getNamespaceName();
        $c = $namespace.'\\'.$key;

        return class_exists($c) ?
            $c : $this->getValidNamespace(get_parent_class($class), $key);
    }
}
