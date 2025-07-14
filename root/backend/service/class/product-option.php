<?php

class ProductOption
{
    private array $container;

    public function __construct(array $assocArray)
    {
        $this->container = $assocArray;
    }

    public function keyExists(string|int $key): bool
    {
        return array_key_exists($key, $this->container);
    }

    public function get(string|int $key): mixed
    {
        return $this->container[$key];
    }

    public function add(string|int $key, mixed $value): bool
    {
        if (!isset($this->container[$key]) || !is_array($this->container[$key])) 
            $this->container[$key] = [];

        if (isset($value))
            array_push($this->container[$key], $value);

        return true;
    }

    public function delete(string|int $key): bool 
    {
        unset($this->container[$key]);

        return true;
    }
}
