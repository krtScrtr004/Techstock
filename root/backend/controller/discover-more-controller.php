<?php

class DiscoverMoreController implements Controller
{
    private function __construct() {}
    
    public static function index(): void
    {
        global $session;
        if (!isset($session)) $session = Session::create();

        $products = Product::all();
        $productModel = $products[1];

        $products = $productModel->all();
        require_once VIEW_PATH . 'discover-more.php';

        errorOccurredDialog();
    }
}
