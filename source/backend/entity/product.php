<?php

class Product implements Model
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
            'mouse-1.jpg'
        ];

        $categories = [
            'Smartphones & Accessories' => [
                'Smartphones',
                'Screen Protectors, Cases',
                'Power Banks & Chargers',
                'Cables & Adapters',
            ],
            'Computers & Laptops' => [
                'Laptops & Notebooks',
                'Desktops & All-in-Ones',
                'Monitors',
                'Laptop Accessories',
            ],
            'Components & PC Parts' => [
                'Processors',
                'Graphics Cards',
                'Motherboards',
                'RAM & Storage',
                'Power Supply Units',
                'Cooling Systems',
                'Cases & Enclosures',
            ],
            'Gaming' => [
                'Gaming Laptops & PCs',
                'Consoles',
                'Game Controllers',
                'Gaming Keyboards & Mice',
                'VR Headsets',
                'Game Titles',
            ],
            'Networking & Smart Home' => [
                'Wi-Fi Routers & Modems',
                'Mesh Systems',
                'Smart Plugs & Bulbs',
                'Smart Speakers & Hubs',
                'Security Cameras & Sensors',
            ],
            'Audio & Music' => [
                'Headphones & Earbuds',
                'Speakers',
                'Microphones',
                'Audio Interfaces',
                'Soundbars & Home Theater Systems',
            ],
            'Wearables & Health Tech' => [
                'Smartwatches & Fitness Bands',
                'Health Monitors',
                'Smart Glasses',
                'Sleep Trackers',
            ],
            'Office & Productivity' => [
                'Printers & Scanners',
                'Keyboards & Mice',
                'Webcams',
                'UPS & Surge Protectors',
                'Software Licenses',
            ],
            'Drones & Cameras' => [
                'Drones',
                'Action Cameras',
                'Digital Cameras & Lenses',
                'Tripods & Gimbals',
            ],
            'Tech for Education' => [
                'Tablets & eReaders',
                'Educational Robots',
                'Styluses & Pen Tablets',
                'Online Course Subscriptions',
            ],
        ];
        
        $idNum = 1;
        $categoryRecords = [];
        foreach ($categories as $parentName => $subcategories) {
            $parentId = $idNum++;
            $categoryRecords[] = [
                'id' => $parentId,
                'parent_id' => null,
                'name' => $parentName,
            ];

            foreach ($subcategories as $childName) {
                $categoryRecords[] = [
                    'id' => $idNum++,
                    'parent_id' => $parentId,
                    'name' => $childName,
                ];
            }
        }

        $options = new ProductOption([
            'colors' => ['Red', 'Blue', 'Green', 'Black', 'White'],
            'variants' => ['Standard', 'Pro', 'Lite'],
            'models' => ['2022', '2023', '2024'],
        ]);

        $stores = Store::all();
        $products = [];


        for ($i = 1; $i <= 20; $i++) {
            $randStore = array_rand($stores);

            $product = new Product([
                'id' => uniqid(),

                'name' => "Product name number $i.",

                'description' =>
                '<h4>Powerful Performance, Sleek Design</h4>
                    <p>
                        Experience next-level productivity with the Techstock UltraBook 15.6" Laptop. Powered by the latest Intel® Core™ i7 processor and 16GB DDR4 RAM, this laptop is designed for seamless multitasking, fast boot times, and smooth operation whether you\'re working, streaming, or gaming.
                    </p>

                    <img src="' . IMAGE_PATH . 'laptop-1.jpg' . '" alt="Product image">

                    <ul style="display: flex; flex-direction: column; gap: 0.5rem;">
                        <li><strong>Display:</strong> 15.6" Full HD IPS, anti-glare, ultra-thin bezels</li>
                        <li><strong>Storage:</strong> 512GB NVMe SSD for lightning-fast file access</li>
                        <li><strong>Graphics:</strong> NVIDIA® GeForce® MX450 for crisp visuals and light gaming</li>
                        <li><strong>Battery Life:</strong> Up to 10 hours on a single charge</li>
                        <li><strong>Connectivity:</strong> Wi-Fi 6, Bluetooth 5.1, USB-C, HDMI, and SD card reader</li>
                        <li><strong>Operating System:</strong> Windows 11 Home pre-installed</li>
                    </ul>
                    
                    <p>
                        The UltraBook\'s lightweight aluminum chassis makes it easy to carry, while the backlit keyboard and precision touchpad ensure comfort and accuracy. Perfect for students, professionals, and creators alike.
                    </p>',

                'stock' => rand(0, 999999) % 10000,

                'price' => round(mt_rand(1000000000, 20000000000) / 100000, 2), // 10.00 to 200.00

                'store' => $stores[$randStore],

                'rating' => [
                    'average' => round(mt_rand(10, 50) / 10, 1),
                    'count' => [
                        'total' => rand(1, 999),
                        'five' => rand(1, 999),
                        'four' => rand(1, 999),
                        'three' => rand(1, 999),
                        'two' => rand(1, 999),
                        'one' => rand(1, 999),
                    ]
                ],

                'images' => [
                    IMAGE_PATH . $images[array_rand($images)],
                    IMAGE_PATH . $images[array_rand($images)],
                    IMAGE_PATH . $images[array_rand($images)],
                    IMAGE_PATH . $images[array_rand($images)],
                    IMAGE_PATH . $images[array_rand($images)],
                    IMAGE_PATH . $images[array_rand($images)]
                ],


                'category' => new ProductCategory(getRandomCategoryPath($categoryRecords)),

                'specification' => [
                    'brand' => 'Snamsung',
                ],

                'options' => $options,

                'sold_count' => rand(0, 500),
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
        return true;
    }

    public function fill(array $data): void
    {
        self::__construct($data);
    }
}

function getRandomCategoryPath(array $categories): array
{
    // Map of categories by id for quick lookup
    $byId = [];
    foreach ($categories as $cat) {
        $byId[$cat['id']] = $cat;
    }

    // Get only child categories (categories with a parent_id)
    $childCategories = array_filter($categories, fn($cat) => $cat['parent_id'] !== null);

    // Pick a random child
    $randomChild = $childCategories[array_rand($childCategories)];

    // Traverse upward to collect parent chain
    $path = [$randomChild['name']];
    $current = $randomChild;

    while ($current['parent_id'] !== null) {
        $parentIdHex = $current['parent_id'];
        if (!isset($byId[$parentIdHex])) {
            break; // orphan, shouldn't happen
        }
        $parent = $byId[$parentIdHex];
        array_unshift($path, $parent['name']);
        $current = $parent;
    }

    return $path;
}