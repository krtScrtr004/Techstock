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

        $ratingCount = 923;
        $soldCount = 109;

        require_once VIEW_PATH . 'product-info.php';

        errorOccurredDialog();
    }
}