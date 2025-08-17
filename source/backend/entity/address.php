<?php

class Address implements Entity
{
    private ?string $houseNumber;
    private string $street;
    private string $city;
    private string $region;
    private int $postalCode;
    private string $country;

    public function __construct(array $data = [])
    {
        // Accept both camelCase and legacy snake_case keys
        $this->houseNumber = $data['houseNumber'] ?? $data['house_number'] ?? null;
        $this->street      = $data['street'] ?? '';
        $this->city        = $data['city'] ?? '';
        $this->region      = $data['region'] ?? 'NCR';
        $this->postalCode  = $data['postalCode'] ?? $data['postal_code'] ?? 0;
        $this->country     = $data['country'] ?? 'Philippines';
    }

    public function __toString(): string
    {
        $houseNumber = ($this->houseNumber) ? "{$this->houseNumber}," : '';
        return "$houseNumber {$this->street}, {$this->city}, {$this->postalCode}, {$this->region}, {$this->country}";
    }

    // Getters
    public function getHouseNumber(): ?string
    {
        return $this->houseNumber;
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
        return $this->postalCode;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    // Setters
    public function setHouseNumber(?string $houseNumber): void
    {
        $this->houseNumber = $houseNumber;
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

    public function setPostalCode(int $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
