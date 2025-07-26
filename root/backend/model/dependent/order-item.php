<?php

class OrderItem extends Product {
    private int $quantity;
    private float $shippingFee;

    public function __construct(array $data)
    {
        parent::__construct($data);
        $this->id = $data['id'] ?? null;
        $this->quantity = $data['quantity'] ?? 1;
        $this->shippingFee = $data['shipping_fee'] ?? 36.00;
    }

    // Getters

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getShippingFee(): float
    {
        return convertCurrency($this->getCurrency(), $this->shippingFee);
    }

    // Setters
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setShippingFee(float $shippingFee): void
    {
        $this->shippingFee = $shippingFee;
    }

    // Utilities

    public function addOption(string|int $key, string|int $value): bool 
    {
        $this->options->add($key, $value);
        return true;
    }

    public function deleteOption(string|int $key): bool
    {
        $this->options->delete($key);
        return true;
    }
}