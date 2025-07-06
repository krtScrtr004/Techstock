<?php

class HomeController implements Controller
{
    private function __construct() {}

    public static function index(): void
    {
        global $session;
        if (!isset($session)) $session = Session::create();

        $products = Product::all();
        $productModel = $products[0];

        require_once VIEW_PATH . 'home.php';
    }
}
