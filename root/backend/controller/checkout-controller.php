<?php

class CheckoutController implements Controller {
    private function __construct() {}
    public static function index(): void
    {
        global $session;
        if (!isset($session)) $session = Session::create();

        require_once VIEW_PATH . 'checkout.php';
    }
}