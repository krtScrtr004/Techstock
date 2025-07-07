<?php

class Product implements Model
{
    private $id;
    private string $name;
    private ?string $description;
    private float $price;
    private int $stock;
    private Store $store;
    private string $currency;
    private float $rating;
    private ?array $images;
    private ?SplDoublyLinkedList $category;
    private ?array $specification;
    private ?array $options;
    private int $soldCount;

    public function __construct(array $data = [])
    {
        $this->id = $data['id'] ?? 1;
        $this->name = $data['name'] ?? 'Product name';
        $this->description = $data['description'] ?? null;
        $this->price = $data['price'] ?? 1.0;
        $this->stock = $data['stock'] ?? 0;
        $this->store = $data['store'] ?? new Store();
        $this->currency = $data['currency'] ?? 'PHP';
        $this->rating = (float) $data['rating'] ?? 0.0;
        $this->images = $data['images'] ?? null;
        $this->category = $data['category'] ?? null;
        $this->specification = $data['specification'] ?? null;
        $this->options = $data['option'] ?? null;
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
        return $this->price;
    }

    public function getStock(): int
    {
        return $this->stock;
    }

    public function getStore(): Store
    {
        return $this->store;
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

    public function getCategory(): ?SplDoublyLinkedList
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

    public function setRating($rating): void
    {
        $this->rating = $rating;
    }

    public function setImages(array $images): void
    {
        $this->images = $images;
    }

    public function setCategory(SplDoublyLinkedList $category): void
    {
        $this->category = $category;
    }

    public function setSpecification(array $specification): void {
        $this->specification = $specification;
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

        function isAssociative($array): bool
        {
            if (!is_array($array)) return false;
            return array_keys($array) !== range(0, count($array) - 1);
        }

        function getSubCategory($arr, $key, &$list)
        {
            if (!isAssociative($arr)) {
                $list->add(0, $arr[array_rand($arr)]);
                return;
            }
            getSubCategory($arr[$key], $key, $list);
            $list->add(0, $key);
        }

        function getCategory($arr): SplDoublyLinkedList
        {
            $list = new SplDoublyLinkedList();
            getSubCategory($arr, array_rand($arr), $list);
            return $list;
        }

        $products = [];

        for ($i = 1; $i <= 20; $i++) {
            $product = new Product([
                'id' => uniqid(),

                'name' => "Sed ut perspiciatis unde omnis iste natus error  sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo $i.",

                'description' => 
                    '<h4>Powerful Performance, Sleek Design</h4>
                    <p>
                        Experience next-level productivity with the Techstock UltraBook 15.6" Laptop. Powered by the latest Intel® Core™ i7 processor and 16GB DDR4 RAM, this laptop is designed for seamless multitasking, fast boot times, and smooth operation whether you\'re working, streaming, or gaming.
                    </p>

                    <img src="'. IMAGE_PATH . 'laptop-1.jpg' .'" alt="Product image">

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

                'store' => new Store(
                    [
                        'id' => rand(1, 9999),
                        'name' => "Store Madrigal $i",
                        'description' => 'Lorem ipsum nam usblk block iahsn. Johel mlan ilak olsb qwicrr loue.',
                        'logo' => IMAGE_PATH . 'brand logo/acer.png',
                        'email' => 'store-email@gmail.com',
                        'contact' => '+639150082561',
                        'location' => new Address(
                            [
                                'street' => 'Santol St.',
                                'city' => 'Mandaluyong City',
                                'region' => 'NCR',
                                'postal_code' => 1551,
                                'country' => 'Philippines'
                            ]
                        ),
                        'product_count' => rand(1, 99999),
                        'follower_count' => rand(1, 99999),
                        'is_verified' => 'pending'
                    ]
                ),

                'rating' => round(mt_rand(10, 50) / 10, 1), // 1.0 to 5.0

                'images' => [
                    IMAGE_PATH . $images[array_rand($images)],
                    IMAGE_PATH . $images[array_rand($images)],
                    IMAGE_PATH . $images[array_rand($images)],
                    IMAGE_PATH . $images[array_rand($images)],
                    IMAGE_PATH . $images[array_rand($images)],
                    IMAGE_PATH . $images[array_rand($images)]
                ],


                'category' => getCategory($categories),

                'specification' => [
                    'brand' => 'Snamsung',
                ],

                'option' => [
                    'colors' => ['Red', 'Blue', 'Green', 'Black', 'White'],
                    'variants' => ['Standard', 'Pro', 'Lite'],
                    'models' => ['2022', '2023', '2024'],
                ],

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
        // TODO:
        return true;
    }

    public function fill(array $data): void
    {
        self::__construct($data);
    }
}
