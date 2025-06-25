<?php

enum Category: string {
    case sna    = 'smartphone-and-accessories';
    case cnl    = 'computers-and-laptops';
    case cnpp   = 'components-and-pc-parts';
    case gm     = 'gaming';
    case nnsh   = 'networking-and-smart-home';
    case anm    = 'audio-and-music';
    case wnht   = 'wearable-and=home-tech';
    case onp    = 'office-and-productivity';
    case dnc    = 'drone-and-cameras';
    case tfe    = 'tech-for-education';
};

function search(): void {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    require_once VIEW_PATH . 'search.php';
}