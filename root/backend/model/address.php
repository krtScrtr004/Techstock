<?php

class Address implements Model
{
    private ?string $house_number;
    private string $street;
    private string $city;
    private string $region;
    private int $postal_code;
    private string $country;

    public function __construct(array $data = [])
    {
        $this->house_number = $data['house_number'] ?? null;
        $this->street = $data['street'] ?? '';
        $this->city = $data['city'] ?? '';
        $this->region = $data['region'] ?? 'NCR';
        $this->postal_code = $data['postal_code'] ?? 0;
        $this->country = $data['country'] ?? 'Philippines';
    }

    public function __toString(): string
    {
        $house_number = ($this->house_number) ? "$this->house_number," : '';
        return "$house_number $this->street, $this->city, $this->postal_code, $this->region, $this->country";
    }

    // Getters
    public function getHouseNumber(): ?string
    {
        return $this->house_number;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function getPostalCode(): int
    {
        return $this->postal_code;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    // Setters
    public function setHouseNumber(?string $house_number): void
    {
        $this->house_number = $house_number;
    }

    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function setRegion(string $region): void
    {
        $this->region = $region;
    }

    public function setPostalCode(int $postal_code): void
    {
        $this->postal_code = $postal_code;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }


    public static function all(): array
    {
        // TODO: Implement method logic
        return [];
    }

    public static function create(array $data): Model
    {
        // TODO: Implement method logic
        return new self();
    }

    public static function find($id): ?Model
    {
        // TODO: Implement method logic
        return null;
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
