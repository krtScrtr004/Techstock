<?php

class DiscoverMoreController implements Controller
{
    private function __construct() {}
    
    public static function index(): void
    {
        global $session;
        if (!isset($session)) $session = Session::create();

        $productModel = new Product();

        $products = $productModel->all();
        require_once VIEW_PATH . 'discover-more.php';

        errorOccuredDialog();
    }
}
