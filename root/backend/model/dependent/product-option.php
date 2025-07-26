<?php

class ProductOption
{
    private array $container;

    public function __construct(array $assocArray)
    {
        if (!isAssociative($assocArray)) {
            throw new BadMethodCallException('ProductOption constructor only accepts associative array.');
        }
        $this->container = $assocArray;
    }

    public function getKeys(): array
    {
        return array_keys($this->container);
    }

    public function keyExists(string|int $key): bool
    {
        return array_key_exists($key, $this->container);
    }

    public function getValues(string|int $key): array
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

    public function toArray(): array 
    {
        return $this->container;
    }
}
