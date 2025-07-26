<?php

class StoreCollection 
{
    private array $container;

    public function __construct(array $data) 
    {
        $this->container = $data;
    }

    public function add(mixed $value): bool
    {
        
        if (!$this->search($value))
            array_push($this->container, $value);

        return true;
    }

    public function delete(mixed $value): bool
    {
        $index = $this->search($value);
        if (is_numeric($index))
            array_splice($this->container, $index, 1);

        return true;
    }

    public function update(mixed $oldValue, mixed $newValue): void
    {
        $index = $this->search($oldValue);
        (is_numeric($index))
            ? $this->container[$index] = $newValue
            : $this->add($newValue);
    }

    public function search(mixed $value): int|bool
    {
        return array_search($value, $this->container);
    }

    public function toArray(): array
    {
        return $this->container;
    }
}