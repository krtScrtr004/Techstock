<?php

class HomeController implements Controller
{
    private function __construct() {}

    public static function index(): void
    {
        global $session;

        require_once ENUM_PATH . 'category.php';

        $products = ProductModel::all();
        $stores = StoreModel::all();

        require_once VIEW_PATH . 'home.php';
    }
}
