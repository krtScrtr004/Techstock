<?php

class Product implements Model
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

    public function __construct(array $data = [])
    {
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->description = $data['description'];
        $this->price = $data['price'];
        $this->storeId = $data['storeId'];
        $this->currency = $data['currency'];
        $this->rating = $data['rating'];
        $this->images = $data['images'];
        $this->category = $data['category'];
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

    public function getImage(int $index): string
    {
        return $this->images[$index];
    }

    public function getImages(): array 
    {
        return $this->images;
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

    // Implemented methods

    public static function find($id): ?self
    {
        // TODO:
        return null;
    }

    public static function all(): array 
    {
        // TODO:
        return [];
    }

    public static function create(array $data): self
    {
        return new self($data);
    }

    public function save(): bool {
        // TODO:
        return true;
    }

    public function delete(): bool {
        // TODO:
        return true;
    }

    public function fill(array $data): void {
        self::__construct($data);
    }
}

