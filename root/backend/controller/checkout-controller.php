<?php

class CheckoutController implements Controller
{
    private function __construct() {}
    public static function index(): void
    {
        global $session;

        // Dummy
        $buyer = new User([
            'id' => uniqid(),
            'first_name' => 'Kurt',
            'last_name' => 'Secretario',
            'email' => 'kurtSecretario004@gmail.com',
            'address' => new Address([
                'house_number' => '30',
                'street' => 'Santol St. Panatag Rd.',
                'city' => 'Mandaluyong City',
                'region' => 'NCR',
                'postal_code' => 1550
            ])
        ]);

        $checkoutSession = new CheckoutSession([
            'id' => uniqid(),
            'payment_link' => 'https://www.payment-gateway101.com.ph/pay/'
        ]);

        $allStores = Store::all();
        array_splice($allStores, 2);

        $images = [
            'console-1.jpg',
            'controller-1.jpg',
            'devices.jpg',
            'handheld-1.jpg',
            'laptop-1.jpg',
            'laptop-2.jpg',
            'mouse-1.jpg'
        ];

        $orders = [];
        $orderItems = [];
        foreach ($allStores as $store) {
            for ($i = 0; $i < 2; $i++) {
                $orderItem = new OrderItem([
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

                    'options' => new ProductOption([
                        'colors' => ['Red'],
                        'variants' => ['Standard'],
                        'models' => ['2022'],
                    ]),
                ]);
                array_push($orderItems, $orderItem);
            }
            $order = new Order([
                'id' => uniqid(),
                'buyer' => $buyer,
                'store' => $store,
                'orders' => $orderItems,
                'checkout_session' => $checkoutSession
            ]);
            array_push($orders, $order);
            array_splice($orderItems, 0);
        }

        /**
         * Create a method that would process the query result like this:
         * 
         * - Order:
         *  - Order Item:
         * 
         */

        $subTotals = ['merchandise' => 0, 'shipping' => 0];
        foreach ($orders as $order) {
            $subTotals['merchandise'] += $order->calculateOrderPriceTotal();
            $subTotals['shipping'] += $order->calculateShippingFeeTotal();
        }
        $totalPayment = $subTotals['merchandise'] + $subTotals['shipping'];
        
        require_once VIEW_PATH . 'checkout.php';
    }
}
