<?php

class OrderItem {
    private $id;
    private Product $product;
    private int $quantity;
    private float $price;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->product = $data['product'];
        $this->price = $data['price'];
        $this->quantity = $data['quantity'] ?? 1;
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

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}