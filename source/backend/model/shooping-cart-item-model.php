<?php

class ShoppingCartItemModel implements Model 
{
        // Implemented methods

    public static function all(): array
    {
        // TODO: Implement all() method.
        return [];
    }

    public static function create(array $data): Product
    {
        // TODO: Implement create() method.
        return new Product();
    }

    public function delete(): bool
    {
        // TODO: Implement delete() method.
        return true;
    }

    public function fill(array $data): void
    {
        // TODO: Implement fill() method.
    }

    public static function find($id): ?Product
    {
        // TODO: Implement find() method.
        return null;
    }

    public function save(): bool
    {
        // TODO: Implement save() method.
        return true;
    }
}