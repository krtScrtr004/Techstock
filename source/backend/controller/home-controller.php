<?php

class HomeController implements Controller
{
    private function __construct() {}

    public static function index(): void
    {
        global $session, $me;

        require_once ENUM_PATH . 'category.php';
        require_once ENUM_PATH . 'chat-content-type.php';

        $products = ProductModel::all();
        $stores = StoreModel::all();
        $chatSessions = ChatSessionModel::all();
        
        require_once VIEW_PATH . 'home.php';
    }
}
