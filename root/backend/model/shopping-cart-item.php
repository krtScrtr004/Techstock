<?php

class ShoppingCartItem extends Product
{
    private int $quantity;

    private ?ProductOption $selectedOptions;

    public function __construct(array $data) 
    {
        parent::__construct($data);
        $this->quantity = $data['quantity'] ?? 0;
        $this->selectedOptions = $data['selected_options'] ?? null;
    }

    // Getters

    public function getQuantity(): int 
    {
        return $this->quantity;
    }

    public function getSelectedOptions(): ?ProductOption
    {
        return $this->selectedOptions;
    }

    // Setters

    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    public function setSelectedOptions(ProductOption $options): void
    {
        $this->selectedOptions = $options;
    }

    // Utilities

    public static function deleteMultiple(array $idArray): bool
    {
        return true;
    }

    public static function deleteAll(): bool
    {
        // Logic to delete all items goes here
        return true;
    }
}
