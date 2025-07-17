<?php

class StoreController implements Controller
{
    public static function index(): void
    {
        global $session;
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
        $store = $stores[0];

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

                'store' => $store,

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

                'option' => $options,

                'sold_count' => rand(0, 500),
            ]);
        }
        require_once VIEW_PATH . 'store.php';
    }
}
