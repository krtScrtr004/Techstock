<?php

class ProductController implements Controller
{
    private function __construct() {}

    public static function index(): void
    {
        global $session;

        // Dummy
        $user = new User([
            'id' => uniqid(),
            'firstName' => 'Kurt',
            'lastName' => 'Secretario',
            'email' => 'kurtSecretario004@gmail.com',
            'address' => new Address([
                'houseNumber' => '30',
                'street' => 'Santol St. Panatag Rd.',
                'city' => 'Mandaluyong City',
                'region' => 'NCR',
                'postalCode' => 1550
            ])
        ]);

        $products = ProductModel::all();

        $product = $products[0];
        $store = $product->getStore();

        $ratingCount = 923;
        $soldCount = 109;

        $ratings = [
            new Rating([
                'id' => uniqid(),
                'rater' => new User([
                    'id' => uniqid(),
                    'firstName' => 'Lucio',
                    'lastName' => 'Tan',
                    'email' => 'luciotan123@gmail.com',
                ]),
                'rating' => rand(1, 5),
                'comment' => 'Way jsol, alkin olw. Priptp wrt maki opal qwerty.',
                'like' => rand(1, 100)
            ]),
            new Rating([
                'id' => uniqid(),
                'rater' => new User([
                    'id' => uniqid(),
                    'firstName' => 'Mark',
                    'lastName' => 'Tan',
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
                    'id' => uniqid(),
                    'firstName' => 'Mark',
                    'lastName' => 'Tan',
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

        $chatSessions = ChatSessionModel::all();
        $storeChatSessionId = null;
        foreach ($chatSessions as $csession) {
            $storeId = $store->getId();
            $otherPartyId = $csession->getOtherParty()->getId();
            if ($storeId === $otherPartyId) {
                $storeChatSession = $csession->getId();
            }
        }

        require_once VIEW_PATH . 'product.php';
    }
}
