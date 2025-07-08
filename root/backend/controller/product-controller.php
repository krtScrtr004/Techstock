<?php

class ProductController implements Controller
{
    private function __construct() {}

    public static function index(): void {}

    public static function info(): void
    {
        global $session;
        if (!isset($session)) $session = Session::create();

        // Dummy
        $products = Product::all();

        $product = $products[0];
        $store = $product->getStore();

        $ratingCount = 923;
        $soldCount = 109;

        $ratings = [
            new Rating([
                'id' => uniqid(),
                'rater' => new User([
                    'first_name' => 'Lucio',
                    'last_name' => 'Tan',
                    'email' => 'luciotan123@gmail.com',
                ]),
                'rating' => rand(1, 5),
                'comment' => 'Way jsol, alkin olw. Priptp wrt maki opal qwerty.',
                'like' => rand(1, 100)
            ]),
            new Rating([
                'id' => uniqid(),
                'rater' => new User([
                    'first_name' => 'Mark',
                    'last_name' => 'Tan',
                    'email' => 'marktan123@gmail.com',
                ]),
                'rating' => rand(1, 5),
                'comment' => 'Poajdh ahsi. Kai oalp hqiixii lkso, uasc ajsiw lopam njuio losp. Lalapd!!!',
                'images' => [
                    IMAGE_PATH . 'laptop-1.jpg',
                    IMAGE_PATH . 'laptop-2.jpg',
                    IMAGE_PATH . 'console-1.jpg',
                ],
                'like' => rand(1, 100)
            ]),
            new Rating([
                'id' => uniqid(),
                'rater' => new User([
                    'first_name' => 'Mark',
                    'last_name' => 'Tan',
                    'email' => 'marktan123@gmail.com',
                ]),
                'rating' => rand(1, 5),
                'comment' => 'Poajdh ahsi. Kai oalp 
                hqiixii lkso, uasc ajsiw lopam njuio losp. Lalapd!!!',
                'like' => rand(1, 100),
                'reply' => new RatingReply([
                    'id' => uniqid(),
                    'reply' => 'Ola isq popop loam. Aamlp ikao malkunx iolpaaa.'
                ])
            ])
        ];

        require_once VIEW_PATH . 'product-info.php';
    }
}
