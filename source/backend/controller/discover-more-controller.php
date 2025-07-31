<?php

class DiscoverMoreController implements Controller
{
    private function __construct() {}
    
    public static function index(): void
    {
        global $session;
        
        $products = ProductModel::all();
        $productModel = $products[1];

        require_once VIEW_PATH . 'discover-more.php';
    }
}
