<?php

class HomeController implements Controller
{
    private function __construct() {}

    public static function index(): void
    {
        global $session;

        require_once ENUM_PATH . 'category.php';
        require_once ENUM_PATH . 'chat-content-type.php';

        $products = ProductModel::all();
        $stores = StoreModel::all();

        $me = new User([
            'id' => uniqid(),
            'first_name' => 'Kurt',
            'last_name' => 'Secretario',
            'email' => 'shwarawt123@gmail.com'
        ]);

        $chatSessions = [];
        for ($i = 0; $i < 5; $i++) {
            $randomStore = $stores[rand(0, count($stores))];

            $messages = [];
            for ($j = 0; $j < 20; $j++) {
                array_push($messages, new ChatMessage([
                    'id' => uniqid(),
                    'sender' => ($j % 2 === 0) ? $me : $randomStore,
                    'type' => ChatContentType::Text,
                    'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non odio eius explicabo? Eum est explicabo exercitationem quibusdam eius deleniti optio iusto facere sint nobis, saepe voluptate error voluptas ea blanditiis.',
                ]));
            }
            array_push($chatSessions, new ChatSession([
                'id' => uniqid(),
                'other_party' => $randomStore,
                'messages' => $messages
            ]));
        }



        require_once VIEW_PATH . 'home.php';
    }
}
