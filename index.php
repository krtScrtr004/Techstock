<?php
require_once 'root/backend/config/config.php';
require_once ENUM_PATH . 'currency.php';

$clientCountry = null;
if ($session->isSet() && $session->get('country'))
    $clientCountry = Currency::fromCountry($session->get('country'));
else
    $clientCountry = Currency::Philippines;

define('DEFAULT_CURRENCY', $clientCountry);
define('DEFAULT_CURRENCY_SYMBOL', $clientCountry->symbol());

require_once ROUTER_PATH . 'register-routes.php';
// Remove this
include_once DUMP_PATH . 'dumps.php';

$router->dispatch();
