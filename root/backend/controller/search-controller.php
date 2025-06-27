<?php

enum Category: string
{
    case sna    = 'smartphone-and-accessories';
    case cnl    = 'computers-and-laptops';
    case cnpp   = 'components-and-pc-parts';
    case gm     = 'gaming';
    case nnsh   = 'networking-and-smart-home';
    case anm    = 'audio-and-music';
    case wnht   = 'wearable-and-health-tech';
    case onp    = 'office-and-productivity';
    case dnc    = 'drone-and-cameras';
    case tfe    = 'tech-for-education';
};

class SearchController implements Controller
{
    private function __construct() {}

    public static function index(): void
    {
        global $session;
        if (!isset($session)) $session = Session::create();

        $products = Product::all();

        require_once VIEW_PATH . 'search.php';

        errorOccurredDialog();
    }
}
