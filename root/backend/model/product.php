<?php

class Product implements Model
{
    private $id;
    private string $name;
    private ?string $description;
    private float $price;
    private $storeId;
    private string $currency;
    private float $rating;
    private ?array $images;
    private ?array $category;
    private ?array $options;
    private int $soldCount;

    public function __construct(array $data = [])
    {
        if ($data) {
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->description = $data['description'] ?? null;
            $this->price = $data['price'];
            $this->storeId = $data['storeId'];
            $this->currency = $data['currency']  ?? 'PHP';
            $this->rating = (float) $data['rating'] ?? 0.0;
            $this->images = $data['images'] ?? null;
            $this->category = $data['category'] ?? null;
            $this->options = $data['option'] ?? null;
            $this->soldCount = $data['sold_cold'] ?? 0;
        }
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
        return $this->price;
    }

    public function getStoreId()
    {
        return $this->storeId;
    }

    public function getCurrency(): string
    {
        switch ($this->currency) {
            case 'USD':
                return '&dollar;';
            case 'YEN':
                return '&yen;';
            case 'EURO':
                return '&euro;';
            case 'RUBLE':
                return '&#8381;';
            case 'YUAN':
                return '&#20803;';
            case 'WON':
                return '&#8361;';
            default:
                return '&#x20B1;'; // Default to Philippine Peso
        }
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function getImage(int $index): ?string
    {
        return $this->images[$index];
    }

    public function getImages(): ?array
    {
        return $this->images;
    }

    public function getCategory(): ?array
    {
        return $this->category;
    }

    public function getOptions(): ?array
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

    public function setOptions(array $options): void
    {
        $this->options = $options;
    }

    public function setSoldCount(int $soldCount): void
    {
        $this->soldCount = $soldCount;
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
        // Dummy
        $images = [
            'console-1.jpg',
            'controller-1.jpg',
            'devices.jpg',
            'handheld-1.jpg',
            'laptop-1.jpg',
            'laptop-2.jpg',
            'mouse-1.jpg',
        ];

        $categories = [
            'Smartphones & Accessories',
            'Computers & Laptops',
            'Components & PC Parts',
            'Gaming',
            'Networking & Smart Home',
            'Audio & Music',
            'Wearables & Health Tech',
            'Office & Productivity',
            'Drones & Cameras',
            'Tech for Education',
        ];

        $products = [];

        for ($i = 1; $i <= 20; $i++) {
            $product = new Product([
            'id' => uniqid(),

            'name' => "Sed ut perspiciatis unde omnis iste natus error  sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo $i.",

            'description' => "But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful $i.",

            'price' => round(mt_rand(1000000000, 20000000000) / 100000, 2), // 10.00 to 200.00

            'storeId' => rand(1, 5),

            'rating' => round(mt_rand(10, 50) / 10, 1), // 1.0 to 5.0

            'images' => [
                IMAGE_PATH . $images[array_rand($images)],
                IMAGE_PATH . $images[array_rand($images)],
                IMAGE_PATH . $images[array_rand($images)]
            ],

            'category' => [
                $categories[array_rand($categories)],
                $categories[array_rand($categories)],
                $categories[array_rand($categories)]
            ],

            'option' => [
                'colors' => ['Red', 'Blue', 'Green', 'Black', 'White'],
                'variants' => ['Standard', 'Pro', 'Lite'],
                'models' => ['2022', '2023', '2024'],
            ],

            'sold_cold' => rand(0, 500),
            ]);

            $products[] = $product;
        }

        return $products;
    }

    public static function create(array $data): self
    {
        return new self($data);
    }

    public function save(): bool
    {
        // TODO:
        return true;
    }

    public function delete(): bool
    {
        // TODO:
        return true;
    }

    public function fill(array $data): void
    {
        self::__construct($data);
    }
}
