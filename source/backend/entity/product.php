<?php

class Product 
{
    protected $id;
    protected string $name;
    protected ?string $description;
    protected float $price;
    protected int $stock;
    protected Store $store;
    protected Currency $currency;
    protected array $rating;
    protected ?array $images;
    protected ?ProductCategory $category;
    protected ?array $specification;
    protected ?ProductOption $options;
    protected int $soldCount;

    public function __construct(array $data = [])
    {
        $this->id = $data['id'] ?? 1;
        $this->name = $data['name'] ?? 'Product name';
        $this->description = $data['description'] ?? null;
        $this->price = $data['price'] ?? 1.0;
        $this->stock = $data['stock'] ?? 0;
        $this->store = $data['store'] ?? new Store();
        $this->currency = $data['currency'] ?? DEFAULT_CURRENCY;
        $this->rating = $data['rating'] ??
            [
                'average' => 0.0,
                'count' => [
                    'total' => 0,
                    'five' => 0,
                    'four' => 0,
                    'three' => 0,
                    'two' => 0,
                    'one' => 0
                ]
            ];
        $this->images = $data['images'] ?? null;
        $this->category = $data['category'] ?? null;
        $this->specification = $data['specification'] ?? null;
        $this->options = $data['options'] ?? null;
        $this->soldCount = $data['sold_count'] ?? 0;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function getPrice(): float
    {
        return convertCurrency($this->currency, $this->price);
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getStore(): Store
    {
        return $this->store;
    }

    public function getCurrency(): Currency
    {
        return $this->currency;
    }

    public function getAverageRating(): float
    {
        return $this->rating['average'];
    }

    public function getTotalRatingCount(): int
    {
        return $this->rating['count']['total'];
    }

    public function getFiveRatingCount(): int
    {
        return $this->rating['count']['five'];
    }

    public function getFourRatingCount(): int
    {
        return $this->rating['count']['four'];
    }

    public function getThreeRatingCount(): int
    {
        return $this->rating['count']['three'];
    }

    public function getTwoRatingCount(): int
    {
        return $this->rating['count']['two'];
    }

    public function getOneRatingCount(): int
    {
        return $this->rating['count']['one'];
    }

    public function getImage(int $index): ?string
    {
        return $this->images[$index];
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function getCategory(): ?ProductCategory
    {
        return $this->category;
    }

    public function getSpecification(string|int $key): ?string
    {
        return $this->specification[$key];
    }

    public function getSpecifications(): ?array
    {
        return $this->specification;
    }

    public function getOptions(): ?ProductOption
    {
        return $this->options;
    }

    public function getSoldCount(): int
    {
        return $this->soldCount;
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

    public function setStock(int $stock): void
    {
        $this->stock = $stock;
    }

    public function setStore(Store $store): void
    {
        $this->store = $store;
    }

    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    public function setAverageRating(float $averageRating): void
    {
        $this->rating['average'] = $averageRating;
    }

    public function setTotalRatingCount(int $ratingCount): void
    {
        $this->rating['count']['total'] = $ratingCount;
    }

    public function setFiveRatingCount(int $ratingCount): void
    {
        $this->rating['count']['five'] = $ratingCount;
    }

    public function setFourRatingCount(int $ratingCount): void
    {
        $this->rating['count']['four'] = $ratingCount;
    }

    public function setThreeRatingCount(int $ratingCount): void
    {
        $this->rating['count']['three'] = $ratingCount;
    }

    public function setTwoRatingCount(int $ratingCount): void
    {
        $this->rating['count']['two'] = $ratingCount;
    }

    public function setOneRatingCount(int $ratingCount): void
    {
        $this->rating['count']['one'] = $ratingCount;
    }

    public function setImages(array $images): void
    {
        $this->images = $images;
    }

    public function setCategory(ProductCategory $category): void
    {
        $this->category = $category;
    }

    public function setSpecification(array $specification): void
    {
        $this->specification = $specification;
    }

    public function setOptions(ProductOption $options): void
    {
        $this->options = $options;
    }

    public function setSoldCount(int $soldCount): void
    {
        $this->soldCount = $soldCount;
    }
}

