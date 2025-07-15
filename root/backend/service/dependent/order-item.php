<?php

class OrderItem {
    private $id;
    private Product $product;
    private int $quantity;
    private ?ProductOption $option;
    private float $price;   
    private float $shippingFee;

    public function __construct(array $data)
    {
        $this->id = $data['id'] ?? null;
        $this->product = $data['product'];
        $this->quantity = $data['quantity'] ?? 1;
        $this->option = $data['option'] ?? null;
        $this->price = $data['price'];
        $this->shippingFee = $data['shipping_fee'] ?? 36.00;
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

    public function getOption(): ?ProductOption
    {
        return $this->option;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getShippingFee(): float
    {
        return $this->shippingFee;
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

    public function setOption(ProductOption $option): void {
        $this->option = $option;
    }

    public function setPrice(float $price): void
    {
        $this->price = $price;
    }

    public function setShippingFee(float $shippingFee): void
    {
        $this->shippingFee = $shippingFee;
    }

    // Utilities

    public function addOption(string|int $key, string|int $value): bool 
    {
        $this->option->add($key, $value);
        return true;
    }

    public function deleteOption(string|int $key): bool
    {
        $this->option->delete($key);
        return true;
    }
}