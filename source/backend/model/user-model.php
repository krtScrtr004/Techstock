<?php

class UserModel implements Model
{
    // Implemented Methods
    public static function all(): array
    {
        // TODO: Implement all() method.
        return [];
    }

    public static function create(array $data): User
    {
        // TODO: Implement create() method.
        return new User();
    }

    public static function find($id): ?User
    {
        // TODO: Implement find() method.
        return null;
    }

    public function save(): bool
    {
        // TODO: Implement save() method.
        return true;
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
}
