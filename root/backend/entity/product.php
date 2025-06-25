<?php

class Product
{
    private $id;
    private $name;
    private $description;
    private $price;
    private $storeId;
    private $currency;
    private $rating;
    private $images = [];
    private $category = [];

    public function __construct(
        $id,
        string $name,
        string $description,
        float $price,
        $storeId,
        string $currency = 'PHP',
        float $rating = 0.0,
        array $images = [],
        array $category = []
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->storeId = $storeId;
        $this->currency = $currency;
        $this->rating = $rating;
        $this->images = $images;
        $this->category = $category;
    }

    // Getter methods
    public function getId()
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function getStoreId()
    {
        return $this->storeId;
    }

    public function getCurrency(): string
    {
        switch ($this->currency) {
            case 'USD':     return '&dollar;';
            case 'YEN':     return '&yen;';
            case 'EURO':    return '&euro;';
            case 'RUBLE':   return '&#8381;';
            case 'YUAN':    return '&#20803;';
            case 'WON':     return '&#8361;';
            default:        return '&#x20B1;'; // Default to Philippine Peso
        }
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getImage(int $index): array
    {
        return $this->images[$index];
    }

    public function getCategory(): array
    {
        return $this->category;
    }

    // Setter methods

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setDescription($description): void
    {
        $this->description = $description;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function setStoreId($storeId): void
    {
        $this->storeId = $storeId;
    }

    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    public function setRating($rating): void
    {
        $this->rating = $rating;
    }

    public function setImages(array $images): void
    {
        $this->images = $images;
    }

    public function setCategory(array $category): void
    {
        $this->category = $category;
    }
}

