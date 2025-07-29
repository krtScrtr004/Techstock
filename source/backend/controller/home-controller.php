<?php

class HomeController implements Controller
{
    private function __construct() {}

    public static function index(): void
    {
        global $session;

        require_once ENUM_PATH . 'category.php';

        $products = Product::all();
        $stores = Store::all();

        require_once VIEW_PATH . 'home.php';
    }
}
