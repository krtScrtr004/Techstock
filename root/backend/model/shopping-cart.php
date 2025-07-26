<?php

class ShoppingCart
{
    private array $cart;

    public function __construct($data)
    {
        if ($data instanceof ShoppingCartItem) {
            foreach ($data as $item) {
                $id = $item->getId();
                $this->cart[$id] = $item;
            }
        } else if (is_array($data) && isAssociative($data)) {
            $this->cart = $data;
        } else {
            throw new BadMethodCallException(
                'ShoppingCart Class constructor can only take an associative array or an instance of ShoppingCartItem'
            );
        }
    }

    // Getters

    public function get($id): ?Product
    {
        return $this->cart[$id];
    }

    public function getAll(): array
    {
        return $this->cart;
    }

    public function getAllFlat(): array
    {
        return array_values($this->cart);
    }

    // Setters

    public function setCart($cart): void
    {
        $this->cart = $cart;
    }

    // Utilities

    public function add(ShoppingCartItem $item): bool
    {
        $id = $item->getId();
        $this->cart[$id] = $item; // TODO: Cast the id to string in key

        return true;
    }

    public function delete($id): bool
    {
        $item = $this->cart[$id];
        if ($item && $item instanceof ShoppingCartItem) {
            unset($this->cart[$id]);
            $item->delete();
        }
        return true;
    }

    public function deleteAll(): bool
    {
        $ids = array_keys($this->cart);
        $this->cart = [];

        return ShoppingCartItem::deleteMultiple($ids);
    }
}
