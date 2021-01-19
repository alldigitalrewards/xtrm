<?php

namespace AllDigitalRewards\Xtrm\Entity\Response;

abstract class AbstractEntity implements \JsonSerializable
{
    public function __construct(array $data = null)
    {
        if (!is_null($data)) {
            $this->hydrate($data);
        }
    }

    public function toArray():array
    {
        $data = call_user_func('get_object_vars', $this);

        foreach ($data as $key => $value) {
            if ($value instanceof \DateTime) {
                $data[$key] = $value->format('Y-m-d H:i:s');
            }
        }

        return $data;
    }

    /**
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function hydrate(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = $this->getSetterMethod($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }

    private function getSetterMethod($propertyName)
    {
        return "set" . str_replace(' ', '', ucwords(str_replace('_', ' ', $propertyName)));
    }
}
