<?php

class OrderModel implements Model {
    // Implemented Methods

    public static function all(): array
    {
        // TODO: Implement method logic
        return [];
    }

    public static function find($id): ?Order
    {
        // TODO: Implement method logic
        return null;
    }

    public static function create(array $data): Order
    {
        // TODO: Implement method logic
        return new Order();
    }

    public function save(): bool
    {
        // TODO: Implement method logic
        return true;
    }

    public function delete(): bool
    {
        // TODO: Implement method logic
        return true;
    }

    public function fill(array $data): void
    {
        // TODO: Implement method logic
    }
}