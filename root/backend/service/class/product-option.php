<?php

class ProductOption
{
    private string|int $key;
    private mixed $value;

    public function __construct(string|int $key, mixed $value)
    {
        $this->key = $key;
        $this->value = $value;
    }

    public function getKey(): string|int
    {
        return $this->key;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }

    public function setKey(string|int $key): void
    {
        $this->key = $key;
    }

    public function setValue(mixed $value): void
    {
        $this->value = $value;
    }
}
