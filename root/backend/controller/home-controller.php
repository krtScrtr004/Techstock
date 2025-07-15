<?php

class HomeController implements Controller
{
    private function __construct() {}

    public static function index(): void
    {
        global $session;

        require_once ENUM_PATH . 'category.php';
        $categories = [
            'phone_b.svg'      => Category::sna->value,
            'pc_b.svg'         => Category::cnl->value,
            'pc-parts_b.svg'   => Category::cnpp->value,
            'console_b.svg'    => Category::gm->value,
            'router_b.svg'     => Category::nnsh->value,
            'headphone_b.svg'  => Category::anm->value,
            'smartwatch_b.svg' => Category::wnht->value,
            'printer_b.svg'    => Category::onp->value,
            'camera_b.svg'     => Category::dnc->value,
            'arduino_b.svg'    => Category::tfe->value,
        ];

        $products = Product::all();
        $stores = Store::all();

        require_once VIEW_PATH . 'home.php';
    }
}
