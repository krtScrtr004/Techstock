<?php

class OrderItem {
    private $id;
    private Product $product;
    private int $quantity;
    private ?array $option;
    private float $price;   

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->product = $data['product'];
        $this->quantity = $data['quantity'] ?? 1;
        $this->option = $data['option'] ?? null;
        $this->price = $data['price'];
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function getOption(): ?array
    {
        return $this->option;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    // Setters
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setOption(array $option): void {
        $this->option = $option;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    // Utilities

    public function addOption(string|int $key, string|int $value): bool 
    {
        $this->option[$key] = $value;
        return true;
    }

    public function deleteOption(string|int $key): bool
    {
        unset($this->option[$key]);
        return true;
    }
}