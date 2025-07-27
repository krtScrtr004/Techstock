<?php

class ShoppingCartItem extends Product
{
    private int $quantity;

    public function __construct(array $data) 
    {
        parent::__construct($data);
        $this->quantity = $data['quantity'] ?? 0;
    }

    // Getters

    public function getQuantity(): int 
    {
        return $this->quantity;
    }

    // Setters

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    // Utilities

    public static function deleteMultiple(array $idArray): bool
    {
        return true;
    }

    public static function deleteAll($id = null): bool
    {
        return true;
    }
}
