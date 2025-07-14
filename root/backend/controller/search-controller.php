<?php

class SearchController implements Controller
{
    private function __construct() {}

    public static function index(): void
    {
        global $session;
        if (!isset($session)) $session = Session::create();

        require_once ENUM_PATH . 'category.php';

        $products = Product::all();

        require_once VIEW_PATH . 'search.php';
    }
}
