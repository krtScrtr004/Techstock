<?php

class HomeController implements Controller {
    private static $productModel;

    private function __construct() {}

    public static function index(): void 
    {
        global $session;
        if (isset($session)) 
            $session = $session->create();

        self::$productModel = new Product();

        $products = self::$productModel->all();
        require_once VIEW_PATH . 'home.php';

        errorOccuredDialog();
    }
}