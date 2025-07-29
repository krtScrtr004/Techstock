<?php

class ShoppingCartController implements Controller
{
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

        $cart = new ShoppingCart();
        foreach ($allStores as $store) {
            for ($i = 0; $i < 2; $i++) {
                $item = new ShoppingCartItem([
                    'id' => uniqid(),

                    'name' => "Product name number $i.",

                    'price' => round(mt_rand(1000000000, 20000000000) / 100000, 2), // 10.00 to 200.00

                    'store' => $store,

                    'images' => [
                        IMAGE_PATH . $images[array_rand($images)],
                        IMAGE_PATH . $images[array_rand($images)],
                        IMAGE_PATH . $images[array_rand($images)],
                        IMAGE_PATH . $images[array_rand($images)],
                        IMAGE_PATH . $images[array_rand($images)],
                        IMAGE_PATH . $images[array_rand($images)]
                    ],

                    'options' => new ProductOption([
                        'colors' => ['Red', 'green', 'black'],
                        'variants' => ['Standard', 'Pro', 'Lite'],
                        'models' => ['2022', '2323'],
                    ]),

                    'selected_options' => new ProductOption([
                        'colors' => ['green'],
                        'variants' => ['Pro'],
                        'models' => ['2323']
                    ]),

                    'quantity' => rand(1, 10)
                ]);
                $cart->add($item);
            }
        }

        require_once VIEW_PATH . 'shopping-cart.php';
    }
}
