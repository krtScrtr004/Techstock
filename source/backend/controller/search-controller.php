<?php

class SearchController implements Controller
{
    private function __construct() {}

    public static function index(): void
    {
        global $session;

        require_once ENUM_PATH . 'category.php';

        $products = ProductModel::all();
        $chatSessions = ChatSessionModel::all();

        require_once VIEW_PATH . 'search.php';
    }
}
